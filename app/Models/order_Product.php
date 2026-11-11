<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order_Product extends Model
{
    use HasFactory;
    protected $table ='order_product';
    protected $guarded = [];
    protected $hidden = ['created_at', 'updated_at'];
}
