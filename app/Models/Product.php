<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory, HasUuids;

    protected $fillable = [
        'category_id',
        'name',
        'sku',
        'description',
        'price',
        'stock',
        'weight',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function productPhotos()
    {
        return $this->hasMany(ProductPhoto::class);
    }

    /**
     * Scope untuk filter produk berdasarkan kategori, harga, pencarian, dan sort
     */
    public function scopeFilter($query, $filters)
    {
        if ($filters->has('ctg')) {
            $categoryIds = explode('|', $filters->get('ctg'));
            $query->whereIn('category_id', $categoryIds);
        }

        if ($filters->has('price')) {
            $priceParts = explode('|', $filters->get('price'));
            if (count($priceParts) === 2) {
                [$minPrice, $maxPrice] = $priceParts;
                if ($maxPrice === '∞') {
                    $query->where('price', '>=', (int)$minPrice);
                } elseif (is_numeric($minPrice) && is_numeric($maxPrice)) {
                    $query->whereBetween('price', [(int)$minPrice, (int)$maxPrice]);
                }
            }
        }

        if ($filters->has('src')) {
            $query->where('name', 'like', '%' . $filters->get('src') . '%')
                ->orWhere('description', 'like', '%' . $filters->get('src') . '%');
        }

        if ($filters->has('sort')) {
            switch ($filters->get('sort')) {
                case 'price':
                    $query->orderBy('price', 'asc');
                    break;
                case 'price-desc':
                    $query->orderBy('price', 'desc');
                    break;
                case 'date':
                    $query->orderBy('created_at', 'desc');
                    break;
                default:
                    $query->orderBy('created_at', 'desc');
                    break;
            }
        }

        return $query;
    }
}
