<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member_prj extends Model
{
    protected $table = "member_prj";

    public $timestamps = false;

    // public function project()
    // {
    //     return $this->belongsToMany('App\Project', 'id_prj', 'id');
    // }
}
