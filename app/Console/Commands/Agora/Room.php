<?php

namespace App\Console\Commands\Agora;

use App\Models\Ecommerce\RoomCommand;
use Illuminate\Console\Command;
use Symfony\Component\Process\Process;

class Room extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'agora:room {id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Start send stream to the room.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // ffmpeg -i 3.mp4 -ac 2 -ar 48000 -c:a aac 3.aac
        // ffmpeg -i 3.mp4 -c:v h264 -bf 0 -g 25 -an -f m4v 3.h264

        $id = $this->argument('id');

        $this->processCommand($id);
        
        return 0;
    }


    private function processCommand($roomId)
    {
        $roomCommand = RoomCommand::find($roomId);

        if (!$roomCommand) {
            $this->error("roomCommand not exists");
            return 1;
        }

        $room = $roomCommand->room;

        $this->info("room channelid:".$room->channel_id);

        $config = $roomCommand->data;
        $config['channelId'] = $room->channel_id;

        $this->info("config: ". json_encode($config));

        $cmd = ['cd', config('AgoraSDKPath'), '&&', config('SendMediaBinFile')];

        foreach ($config['cmd'] as $c => $v) {
            $cmd[] = '--'.$c;
            $cmd[] = $v;
        }
        
        $this->info("cmd: ". implode(' ', $cmd));

        if ($roomCommand->status == RoomCommand::STATUS_RUNNING) {
            $this->runProcessCommand($cmd);
        }

    }


    private function runProcessCommand($cmd)
    {
        $process = Process::fromShellCommandline(implode(' ', $cmd));
        $process->setTimeout(300);
        $process->start();

        $this->info("Start process");

        while ($process->isRunning()) {

            sleep(30);
        }

        $this->info("End process");
        echo $process->getOutput();

    }
}
