<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier_with_order extends Model
{
    use HasFactory;
    protected $table ='Supplier_with_order';
    protected $guarded = [];
    protected $hidden = ['created_at', 'updated_at'];
}
