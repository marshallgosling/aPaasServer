<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class AgoraOss extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'agora:oss {file}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    private $accessKeyId = "<yourAccessKeyId>";
    private $accessKeySecret = "<yourAccessKeySecret>";
    // Endpoint以杭州为例，其它Region请按实际情况填写。
    private $endpoint = "http://oss-cn-hangzhou.aliyuncs.com";
    // 存储空间名称
    private $bucket= "<yourBucketName>";
    // 文件名称
    private $object = "<yourObjectName>";

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $file = $this->argument('file');


        return 0;
    }
}
