<?php

namespace App\Http\Controllers;
use App\Repositories\ReviewRepositoryInterface;
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

        $review = $this->repository->storereview($request->all());
        return redirect('/books')->with('success', 'Book review is successfully saved');

    }


}
