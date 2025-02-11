<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    protected $fillable = ['product_name', 'price', 'quantity', 'user_id', 'product_id'];

    // Define the relationship with the User model (an order belongs to a user)
    public function user()
    {
        return $this->belongsTo(User::class, 'name');
    }

    // Define the relationship with the Product model (an order belongs to a product)
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_name');
    } 
}
