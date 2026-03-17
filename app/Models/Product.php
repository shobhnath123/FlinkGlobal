<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'slug', 'category_id', 'brand_id',
        'short_description', 'information', 'description',
        'image', 'gallery_images',
        'regular_price', 'sale_price',
        'sku', 'quantity', 'stock', 'featured',
    ];

    protected $casts = [
        'gallery_images' => 'array',
        'featured' => 'boolean',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
