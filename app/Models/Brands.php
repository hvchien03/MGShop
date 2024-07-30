<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class Brands extends Model
{
    use HasFactory;
    protected $connection = 'mongodb';
    protected $collection = 'brands';
    protected $fillable = [
        'name',
    ];
    public function products()
    {
        return $this->hasMany(Products::class, 'brand_id', '_id');
    }
}
