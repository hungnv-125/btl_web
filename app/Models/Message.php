<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = "message";

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo('App\User', 'id_user', 'id');
    }

    public function prj()
    {
        return $this->belongsTo('App\Models\Project', 'id_prj', 'id');
    }
}
