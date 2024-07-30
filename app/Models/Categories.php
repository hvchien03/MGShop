<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;
    protected $connection = 'mongodb';
    protected $collection = 'categories';
    protected $fillable = [
        'name',
    ];
    public function products()
    {
        return $this->hasMany(Products::class, 'category_id', '_id');
    }
}
