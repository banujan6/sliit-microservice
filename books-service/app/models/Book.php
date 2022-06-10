<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';
    protected $primaryKey = 'isbn';
    protected $fillable = [
        'isbn',
        'name',
        'language',
        'genre',
        'authors',
        'availability',
        'published_on',
    ];
}
