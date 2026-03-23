<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'slug', 'category_id', 'brand_id', 'short_description',
        'information', 'description', 'regular_price', 'sale_price',
        'sku', 'quantity', 'stock', 'featured', 'image', 'gallery_images',
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

    // Featured
    public function scopeFeatured($query)
    {
        return $query->where('featured', 1);
    }

    // Sale
    public function scopeOnSale($query)
    {
        return $query->whereNotNull('sale_price');
    }

    // New Arrivals (last 7 days)
    public function scopeNewArrivals($query)
    {
        return $query->where('created_at', '>=', now()->subDays(7));
    }

    public function getGalleryImagesAttribute($value)
    {
        if (is_array($value)) {
            return $value;
        }

        $decoded = json_decode($value, true);

        // handle double encoded JSON
        if (is_string($decoded)) {
            $decoded = json_decode($decoded, true);
        }

        return $decoded ?? [];
    }
}
