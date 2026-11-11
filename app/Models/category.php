<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{

   // protected $table = 'category';
   protected $guarded = [];
   protected $hidden = ['created_at', 'updated_at'];

   public function products()
   {

      return $this->hasMany(Product::class ,'category_id');
      // return $this->hasMany(Product::class,'category_id','id');
   }

   public function salse(){
        
      return $this->belongsToMany(Product::class,'salse_detailse' );
      
  }
}
