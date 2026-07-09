<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class LanceColor extends Model
{
    protected $table = 'lance_colors';

    protected $fillable = [
        'name',
        'price'
    ];
}
