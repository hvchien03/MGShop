<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    protected $connection = 'mongodb';
    protected $collection = 'orders';
    protected $fillable = [
        'user_id',
        'orders',
        'total'
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', '_id');
    }
}
