<?php

namespace App\Models;

use App\Models\Admin\GlassValue;
use App\Models\AttributeValue;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    protected $fillable = [
        'name',
        'sku',
        'slug',
        'stock',
        'discount',
        'can_buy_with_lenses',
        'category_id',
        'description',
        'price',
        'main_image',
        'gallery',
    ];

    protected $casts = [
        'gallery'          => 'array',
    ];


    public function categories()
    {
        return $this->belongsToMany(Category::class, 'product_category');
    }

    public function attributeValues(): BelongsToMany
    {
        return $this->belongsToMany(AttributeValue::class, 'product_attribute_value')->withTimestamps();
    }

    public function variants()
    {
        return $this->belongsToMany(
            Product::class,
            'product_variants',
            'parent_product_id',
            'variant_product_id'
        );
    }

    public function variantParent()
    {
        return $this->belongsToMany(
            Product::class,
            'product_variants',
            'variant_product_id',
            'parent_product_id'
        );
    }


    public function glassValues()
    {
        return $this->belongsToMany(
            GlassValue::class,
            'glass_value_product',
            'product_id',
            'glass_value_id'
        )->withPivot('price')->withTimestamps();
    }





}
