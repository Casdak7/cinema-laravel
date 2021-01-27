<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable = ['name', 'year', 'sinopse', 'duration', 'directors', 'writers', 'stars', 'rating', 'image'];

    public function reviews()
    {
        return $this->hasMany(Review::class, 'movie_id');
    }
}
