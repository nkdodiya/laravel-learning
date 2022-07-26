<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;
use App\Book;


class Review extends Model
{
    protected $fillable = ['user_id','book_id', 'content', 'rating'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function book()
    {
        return $this->belongsTo(Book::class);
    }

}
?>
