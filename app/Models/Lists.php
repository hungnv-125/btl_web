<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lists extends Model
{
    protected $table = "list";

    public $timestamps = false;

    public function task()
    {
        return $this->hasMany('App\Models\Task', 'id_list', 'id');
    }
}
