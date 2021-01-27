<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = ['name', 'message', 'rating', 'movie_id'];

    public function movie()
    {
        return $this->belongsTo(Movie::class, 'movie_id');
    }
}
