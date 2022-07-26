<?php

namespace App\Repositories;

use App\Review;
use App\Repositories\Interfaces\ReviewRepositoryInterface;


class ReviewRepository  implements ReviewRepositoryInterface
{

    public function givereviewbook($id)
    {

        return view('givereview',['id' => $id]);

    }

    public function storereview($request)
    {
        $review =  Review::create($request);
        return redirect('/books')->with('success', 'Book review is successfully saved');
    }
}
