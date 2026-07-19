<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GlassValueLensIndex extends Model
{
    protected $table = 'glass_value_lens_indexes';

    protected $fillable = [
        'glass_value_id',
        'name',
        'price',
    ];

    protected $casts = [
        'price' => 'decimal:2',
    ];

    /**
     * Get the glass value that owns this lens index.
     *
     * @return BelongsTo
     */
    public function glassValue(): BelongsTo
    {
        return $this->belongsTo(GlassValue::class);
    }

    
}
