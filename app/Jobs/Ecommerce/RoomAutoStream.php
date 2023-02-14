<?php

namespace App\Jobs\Ecommerce;

use Illuminate\Bus\Queueable;
use App\Models\Ecommerce\RoomCommand;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Symfony\Component\Process\Process;
use Illuminate\Support\Facades\Cache;
use App\Utilities\RtcTokenBuilder2;

class RoomAutoStream implements ShouldQueue, ShouldBeUnique
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $failOnTimeout = false;

    public $uniqueFor = 3600;
    private $id;
    private $model;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($id)
    {
        $this->id = $id;
    }


    public function uniqueId()
    {
        return "RoomCommand-".$this->id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->processCommand($this->id);
    }

    private function processCommand($roomId)
    {
        $roomCommand = RoomCommand::find($roomId);

        if (!$roomCommand) {
            $this->error("roomCommand not exists");
            return 1;
        }

        $this->model = $roomCommand;

        $room = $roomCommand->room;

        $this->info("room channelid:".$room->channel_id);

        $config = $roomCommand->data;
        $config['cmd']['channelId'] = $room->channel_id;

        if ($config['config']['needToken']) {
            $token = RtcTokenBuilder2::buildTokenWithUid(
                config("AppID-nate"),
                config("Certificate-nate"),
                $room->channel_id,
                $config['cmd']['userId'],
                RtcTokenBuilder2::ROLE_PUBLISHER, 3600, 3600
            );
            $config['cmd']['token'] = $token;
        }

        $this->info("config: ". json_encode($config));

        $cmd = ['cd', config('AgoraSDKPath'), '&&', config('SendMediaBinFile')];

        foreach ($config['cmd'] as $c => $v) {
            $cmd[] = '--'.$c;
            $cmd[] = $v;
        }
        
        $this->info("cmd: ". implode(' ', $cmd));

        if ($roomCommand->status == RoomCommand::STATUS_RUNNING) {
            $this->runProcessCommand($cmd, $config['config']['execTime']);
        }

    }


    private function runProcessCommand($cmd, $timeout=300)
    {
        $process = Process::fromShellCommandline(implode(' ', $cmd));
        // $process->setTimeout($timeout);
        $process->start();
        $pid = $process->getPid();

        $this->info("Start process:".$pid);

        while ($process->isRunning()) {
            $timeout-=10;
            sleep(10);
            if ($timeout<=0) {
                $process->stop();
                break;
            }
        }

        $this->info("End process:".$pid);
        $log = $process->getOutput();

        $this->model->log = $log;
        $this->model->status = RoomCommand::STATUS_STOPED;
        $this->model->save();

    }

    private function error($msg, $enterspace="\n")
    {
        $msg = date('Y/m/d H:i:s ') . "CMD ".$this->id. " error: " . $msg;
        echo $msg.$enterspace;
        Log::channel('jobs')->error($msg);
    }

    private function info($msg, $enterspace="\n")
    {
        $msg = date('Y/m/d H:i:s ')."CMD ".$this->id. " info: " . $msg;
        echo $msg.$enterspace;
        Log::channel('jobs')->info($msg);
    }

    /**
     * Get the cache driver for the unique job lock.
     *
     * @return \Illuminate\Contracts\Cache\Repository
     */
    public function uniqueVia()
    {
        return Cache::driver('redis');
    }
}
