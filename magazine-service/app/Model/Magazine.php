<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Magazine extends Model
{
    protected $table = 'magazine';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'language',
        'published_on',
        'type',
        'availability'
    ];
}
