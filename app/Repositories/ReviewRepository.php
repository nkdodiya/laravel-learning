<?php

namespace App\Repositories;

use App\Review;
use App\Repositories\ReviewRepositoryInterface;


class ReviewRepository  implements ReviewRepositoryInterface
{

    public function givereviewbook($id)
    {
        //return view('givereview',['id' => $id]);

    }

    public function storereview($request)
    {

        return Review::create($request);


    }
}
