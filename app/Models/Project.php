<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = "project";

    public $timestamps = false;

    public function lists()
    {
        return $this->hasMany('App\Models\Lists', 'id_prj', 'id');
    }
    public function user()
    {
        return $this->belongsToMany('App\User', 'member_prj', 'id_prj', 'id_user');
    }
    public function messages()
    {
        return $this->hasMany('App\Models\Message', 'id_prj', 'id');
    }

}
