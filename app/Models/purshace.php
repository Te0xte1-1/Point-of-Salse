<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class purshace extends Model
{
    use HasFactory;
    protected $guarded =[];
   protected $hidden = ['created_at', 'updated_at'];
   public function products()
   {
       return $this->belongsToMany(Product::class,'salse_detailse');
   }
}
