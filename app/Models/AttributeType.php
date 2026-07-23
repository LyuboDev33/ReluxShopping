<?php

namespace App\Models;

use App\Models\AttributeValue;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AttributeType extends Model
{
    protected $fillable = ['name', 'slug'];


      public function values(): HasMany
    {
        return $this->hasMany(AttributeValue::class);
    }

}
