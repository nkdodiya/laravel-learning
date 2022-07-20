<?php

namespace App\Repositories;

use NamTran\LaravelMakeRepositoryService\Repository\BaseRepository;
use App\Repositories\ReviewRepositoryInterface;


class ReviewRepository extends BaseRepository implements ReviewRepositoryInterface
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        //return;
    }

    public function getAllreview()
    {

        return Review::all();


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function givereviewbook($id)
    {

        //return view('givereview',['id' => $id]);


    }
    public function createreview()
    {
        return 'done';
    }
    public function storereview(Request $request)
    {

        $input = $request->all();

        $show = Review::create($input);
        return 'done';

    }
}
