<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class salse extends Model
{
    use HasFactory;
    protected $guarded =[];
    protected $table='salse';
    protected $hidden = ['created_at', 'updated_at'];

    public function products()
    {
        return $this->belongsToMany(Product::class,'salse_detailse');
    }
}
