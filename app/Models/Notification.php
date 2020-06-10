<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $table = "notification";

    public $timestamps = false;
    protected $fillable = ['status'];

    // public function user()
    // {
    //     return $this->belongsTo('App\User', 'id_user', 'id');
    // }

    // public function prj()
    // {
    //     return $this->belongsTo('App\Models\Project', 'id_prj', 'id');
    // }
}
