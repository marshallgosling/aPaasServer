<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Encore\Admin\Config\Config;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $table = config('admin.extensions.config.table', 'admin_config');
        if (Schema::hasTable($table)) {
            Config::load();
        }

        if(isset($_GET['sd'])) {
            \DB::listen(
                function ($sql) {
                    foreach ($sql->bindings as $i => $binding) {
                        if ($binding instanceof \DateTime) {
                            $sql->bindings[$i] = $binding->format('\'Y-m-d H:i:s\'');
                        } else {
                            if (is_string($binding)) {
                                $sql->bindings[$i] = "'$binding'";
                            }
                        }
                    }
                    $query = str_replace(array('%', '?'), array('%%', '%s'), $sql->sql);
                    $query = vsprintf($query, $sql->bindings);
                    $query .= ' ---> time:' . $sql->time;
                    /*$logFile = fopen(
                        storage_path('logs' . DIRECTORY_SEPARATOR . date('Ymd') . '_sql.log'),
                        'a+'
                    );
                    fwrite($logFile, date('Y-m-d H:i:s') . ': ' . $query . PHP_EOL);
                    fclose($logFile);*/
                    echo $query."\n";
                }
            );
        }

    }
}
