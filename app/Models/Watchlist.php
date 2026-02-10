<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Watchlist extends Model
{
    protected $fillable = [
        'user_id',
        'movie_id',
        'rating_id',
        'status',
        'comment'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }

    public function review()
    {
        return $this->belongsTo(Review::class, 'rating_id');
    }
}
