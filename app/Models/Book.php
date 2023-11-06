<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        "title",
        "author",
        "genre_id",
        "publication_year",
        "price",
        "abstract"
    ];

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    public function types()
    {
        return $this->belongsToMany(Type::class);
    }
}
