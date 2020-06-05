<?php

namespace App\Http\Controllers;

use App\Events\RedisEven;
use Illuminate\Http\Request;

class RedisController extends Controller
{
    public function sendMess(Request $req)
    {
        event(
            $e = new RedisEven($req->mess)
        );
        // io . sockets . emit("server-send-message", data);
        return $req->mess;
    }
}
