<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';

    protected $fillable = [
        'title',
        'author',
        'publication_year',
        'category',
        'borrowed_by',
        'expected_return_date',
    ];

    protected $casts = [
        'expected_return_date' => 'date',
    ];
}
