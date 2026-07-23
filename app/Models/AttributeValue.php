<?php

namespace App\Models;

use App\Models\AttributeType;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class AttributeValue extends Model
{
    protected $fillable = ['attribute_type_id', 'value', 'slug'];


    public function type(): BelongsTo
    {
        return $this->belongsTo(AttributeType::class, 'attribute_type_id');
    }

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class,'product_attribute_value')->withTimestamps();
    }


}
