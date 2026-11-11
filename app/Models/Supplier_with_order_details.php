<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier_with_order_details extends Model
{
    use HasFactory;
    protected $table ='supplier_with_order_detailse';
    protected $guarded = [];
    protected $hidden = ['created_at', 'updated_at'];
}
