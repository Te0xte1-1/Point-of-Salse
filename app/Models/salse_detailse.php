<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class salse_detailse extends Model
{
    use HasFactory;
    
    protected $table='salse_detailse';
    protected $guarded=[];
    protected $hidden = ['updated_at' ,'created_at'];

}