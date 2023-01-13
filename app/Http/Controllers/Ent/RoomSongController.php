<?php

namespace App\Http\Controllers\Ent;

use App\Http\Controllers\ApiController;
use App\Models\Ent\User;
use App\Models\Ent\Song;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;

class RoomSongController extends ApiController {

    protected $json = true;


}