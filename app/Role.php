<?php

namespace App;

use Zizaco\Entrust\EntrustRole;
use Illuminate\Database\Eloquent\Model;

class Role extends EntrustRole
{
    use \Illuminate\Database\Eloquent\SoftDeletes;
    protected $dates = ['deleted_at'];
    public function permissions()
    {
        return $this->belongsToMany('App\Permission');
    }
    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
