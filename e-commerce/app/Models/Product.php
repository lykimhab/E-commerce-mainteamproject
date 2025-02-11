<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'name',
        'small_description',
        'description',
        'original_price',
        'selling_price',
        'images',
        // Array to store image URLs
        'qty_stock',
        'tax',
        'status',
        'trending',
        'meta_title',
        'meta_keywords',
        'meta_description',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    // Define the relationship with the Order model (a product has many orders)
    public function orders()
    {
        return $this->hasMany(Order::class, 'product_name');
    }
}
