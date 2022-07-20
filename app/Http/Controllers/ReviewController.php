<?php

namespace App\Http\Controllers;
use App\Repositories\Interfaces\ReviewRepositoryInterface;
use Illuminate\Http\Request;
use App\Review;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $repository;

    public function __construct(ReviewRepositoryInterface $reviewRepository){
        $this->repository = $reviewRepository;
      }


    public function givereview($id)
    {
        $review = $this->repository->givereviewbook($id);

        return view('givereview',['id' => $id]);


    }

    public function store(Request $request)
    {

      return  $this->repository->storereview($request->all());


    }


}
