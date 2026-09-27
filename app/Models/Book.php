<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'title',
        'author',
        'isbn',
        'publisher',
        'pages',
        'synopsis',
        'published_at',
        'total_copies',
        'available_copies',
        'cover',
    ];

    protected function casts(): array
    {
        return [
            'published_at' => 'date',
            'total_copies' => 'integer',
            'available_copies' => 'integer',
            'pages' => 'integer',
        ];
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function wishlistUsers()
    {
        return $this->belongsToMany(User::class, 'wishlists')->withTimestamps();
    }
}
