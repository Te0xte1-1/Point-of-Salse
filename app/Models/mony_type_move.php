<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mony_type_move extends Model
{
    use HasFactory;
    protected $table ='mony_move_type';
    protected $guarded = [];
    protected $hidden = ['created_at', 'updated_at'];
}
