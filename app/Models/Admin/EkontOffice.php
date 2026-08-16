<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class EkontOffice extends Model
{
   protected $fillable = [
        'office_id',
        'name',
        'city',
        'full_address',
    ];



}
