<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable = [
        'name',
        // 'genre_id',
        'director_id',
        // 'actor_id',
        'duration',
        'language_id',
        'release_year',
        'description',
        'image',
        'trailer_link'
    ];

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'movie_genres', 'movie_id', 'genre_id');
    }

    public function director()
    {
        return $this->belongsTo(Director::class, 'director_id');
    }

    public function actors()
    {
        return $this->belongsToMany(Actor::class, 'movie_actors', 'movie_id', 'actor_id');
    }
    
    public function language()
    {
        return $this->belongsTo(Language::class, 'language_id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function watchlists()
    {
        return $this->hasMany(Watchlist::class);
    }
}
