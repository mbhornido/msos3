<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;


    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Product.php
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_product');
    }

    public function reviews()
    {
        return $this->hasMany(reviews::class);
    }
    


}
