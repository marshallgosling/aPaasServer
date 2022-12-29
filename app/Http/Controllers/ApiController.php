<?php

namespace App\Http\Controllers;

use App\Traits\ResponseJson;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Http\Controllers\Controller as BaseController;

class ApiController extends BaseController
{
    use ResponseJson;
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $json = true;

    

}
