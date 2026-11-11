<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $guarded =[];
    protected $hidden = ['created_at', 'updated_at'];
    protected $table="users";
}
