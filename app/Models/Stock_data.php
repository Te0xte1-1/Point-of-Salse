<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock_data extends Model
{
    use HasFactory;
protected $table = 'stock_data'; 
    protected $guarded = [];
    protected $hidden = ['created_at', 'updated_at'];
}
