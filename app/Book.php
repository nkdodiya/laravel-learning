<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Review;
use App\User;
use App\Checkout;

class Book extends Model
{
    protected $fillable = ['author', 'description', 'bookname','isbn','publisheddate','cover'];

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function checkouts()
    {
        return $this->hasOne(Checkout::class);
    }

    public function user()
    {
        return $this->BelongsTo(User::class);
    }
}
