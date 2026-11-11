<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class accounts_type extends Model
{
    use HasFactory;

    protected $table ='accounts_type';
    protected $guarded = [];
    protected $hidden = ['created_at', 'updated_at'];
}
