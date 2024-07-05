<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    use Sluggable;

    protected $table = 'products';
    protected $primaryKey = 'id';

    //Slug
    

    // Fillable
    protected $fillable = [
        'name',
        'description',
        'price',
        'image',
        'stock',
    ];

    public function sluggable() : array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }


    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
