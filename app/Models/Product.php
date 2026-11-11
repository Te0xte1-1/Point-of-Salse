<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table ='products';
    protected $guarded =[];
      
    protected $hidden = ['created_at', 'updated_at'];
    public function category(){
    
        return $this->belongsTo(category::class );
        // return $this->belongsTo(category::class,'category_id','id');
    
    }
    public function salse(){
        
        return $this->belongsToMany(Product::class,'salse_detailse' );
        
    }
    public function purshace(){
        
        return $this->belongsToMany(Product::class,'purshace_detailse' );
        
    }
    
}
