<?php

namespace App\Models\Admin;

use App\Models\Admin\GlassValue;
use App\Models\Admin\VisionType;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Glass extends Model
{
    protected $fillable = [
        'name',
        'category_id',
        'vision_type_id'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function visionType(): BelongsTo
    {
        return $this->belongsTo(VisionType::class);
    }

    public function values()
    {
        return $this->hasMany(GlassValue::class);
    }

    
}
