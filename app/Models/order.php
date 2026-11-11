<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;
    protected $garded =[];
    protected $table ='order';
    protected $fillable = [
        'customer_name',
        'Total',
        'customer_email',
        // '_token',
    ];
    protected $hidden = ['created_at', 'updated_at'];
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
