<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = "task";

    public $timestamps = false;
    protected $fillable = ['description', 'id_list', 'deadline'];

    public function work()
    {
        return $this->hasMany('App\Models\Work', 'id_task', 'id');
    }

    public function file()
    {
        return $this->hasMany('App\Models\AttachFile', 'id_task', 'id');
    }

    public function member()
    {
        return $this->belongsToMany('App\User', 'member_task', 'id_task', 'id_user');
    }
}
