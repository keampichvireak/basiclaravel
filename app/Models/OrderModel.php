<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'model',
        'quantity',
        'total',
        'phone',
        'address',
        'user_order',
        'cardname',
        'cardnumber',
        'status',
    ];

    public function getUser()
    {
        return $this->belongsTo(User::class,'user_order','id');
    }
}
