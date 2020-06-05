<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = "user";
    protected $fillable = [
        'name', 'mail', 'password',
    ];
    public $timestamps = false;

    public function prj()
    {
        return $this->belongsToMany('App\Models\Project', 'member_prj', 'id_user', 'id_prj');
    }
    public function task()
    {
        return $this->belongsToMany('App\Models\Task', 'member_task', 'id_user', 'id_task');
    }
}
