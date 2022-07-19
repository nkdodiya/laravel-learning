<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Review;
use App\User;

class Book extends Model
{
    protected $fillable = ['author', 'description', 'bookname','isbn','publisheddate'];

    public function reviews()
    {
        return $this->hasone(Review::class);
    }

    public function user()
    {
        return $this->BelongsTo(User::class);
    }
}
