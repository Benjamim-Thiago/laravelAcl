<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /*
    public function users()
    {
        return $this->belongsTo(User::class);
    }
    */

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }
}
