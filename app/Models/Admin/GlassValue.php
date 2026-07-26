<?php

namespace App\Models\Admin;

use App\Models\Admin\GlassValueLensIndex;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class GlassValue extends Model
{
    protected $fillable = [
        'glass_id',
        'value',
    ];

    public function glass(): BelongsTo
    {
        return $this->belongsTo(Glass::class);
    }

    public function lensIndexes(): HasMany
    {
        return $this->hasMany(GlassValueLensIndex::class);
    }
}
