<?php

namespace App\Console\Commands\Agora;

use App\Models\Common\Media;
use Illuminate\Console\Command;
use Illuminate\Support\Str;
use Symfony\Component\Process\Process;


class ProcessMp4 extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'agora:mp4 {media?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Process Mp4 file to h264 and aac
    ffmpeg -i 2.mp4 -c:v h264 -bf 0 -g 25 -an -f m4v 2.h264
    ffmpeg -i 3.mp4 -c:v h264 -bf 0 -g 25 -s 360*640 -an -f m4v 33.h264
    ffmpeg -i send_video.mp4 -ac 2 -ar 48000 -c:a aac 4.aac';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $source = $this->argument('media');

        if (!file_exists($source)) {
            echo "File $source does not exist.";
            return 0;
        }

        $targetPath = config('LINUX_MEDIA_PATH', '/data/agora/linux/rtc/media/');

        $ffmpeg = config('FFMPEG_BIN', 'ffmpeg');

        $filename = Str::random(16);
        $video = $filename.'.h264';
        $audio = $filename.'.aac';
        $status = 1;
        
        $commandVideo = [$ffmpeg, '-i', $source, '-c:v h264 -bf 0 -g 25 -an -f m4v', $targetPath.$video];
        $commandAudio = [$ffmpeg, '-i', $source, '-ac 2 -ar 48000 -c:a aac', $targetPath.$audio];


        
        $name = pathinfo($source, PATHINFO_FILENAME);
        
        $media = Media::create(compact('name', 'status', 'video', 'audio', 'source'));

        if ($media)
        {
            $this->runProcessCommand($commandVideo);
            $this->runProcessCommand($commandAudio);


            if (file_exists($targetPath.$video) && file_exists($targetPath.$audio)) {
                $media->status = Media::STATUS_READY;
                $media->save();
            }
            else {
                $media->status = Media::STATUS_DELETED;
                $media->save();
            }
            
        }

        return 0;
    }

    private function runProcessCommand($cmd)
    {
        $process = Process::fromShellCommandline(implode(' ', $cmd));
        $process->setTimeout(1800);
        $process->start();

        $this->info("Start process:");
        $this->info(implode(' ', $cmd));

        while ($process->isRunning()) {

            sleep(3);
        }

        $this->info("End process");
        echo $process->getOutput();

    }
}
