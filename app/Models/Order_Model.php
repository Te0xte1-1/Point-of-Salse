<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_Model extends Model
{
    use HasFactory;
    protected $guarded =[];
    protected $hidden = ['created_at', 'updated_at'];
}
