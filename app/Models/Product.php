<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Fillable
    protected $fillable = [
        'name',
        'description',
        'price',
        'image',
        'availability',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
