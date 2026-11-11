<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Treasures_Transactions extends Model
{
    use HasFactory;
    protected $table = 'treasures_transactions';
    protected $guarded = [];
    protected $fillable = [
        'id', 'isal_number',
        'shift_code', 'treasures_id', 'is_account',
        'account_number', 'money', 'money_for_account', 'foreign_key', 'move_type_id', 'created_at','updated_at','added_by',
        'date'
    ];
    protected $hidden = ['created_at', 'updated_at'];
}
