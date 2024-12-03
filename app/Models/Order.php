<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
        'size',
        'quantity',
        'price',
        'name',
        'rec_address',
        'phone',
        'status',
        'track',
        'payment_method',
        'total_fee',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
