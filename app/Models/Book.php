<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    // This tells Laravel which table to use
    protected $table = 'books';

    // This allows these fields to be filled by your form
    protected $fillable = [
        'title', 
        'author', 
        'description', 
        'genre', 
        'published_year', 
        'isbn', 
        'pages', 
        'language', 
        'publisher', 
        'price', 
        'cover_image', 
        'is_available'
    ];
}