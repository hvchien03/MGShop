<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    protected $connection = 'mongodb';
    protected $collection = 'orders';
    protected $fillable = [
        'user_id',
        'products',
        'address',
        'date',
        'total',
        'payment_status',
        'delivery_status'
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', '_id');
    }
}
