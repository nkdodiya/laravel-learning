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

    public function index()
    {

        $review = $this->repository->getAllreview();
        return view('index_review', compact('review'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function givereview($id)
    {
        $review = $this->repository->givereviewbook($id);

        return view('givereview',['id' => $id]);


    }
    public function create()
    {
        $review = $this->repository->createreview();
        return 'done';
    }
    public function store(Request $request)
    {

        $review = $this->repository->storereview($request);
        return redirect('/books')->with('success', 'Book review is successfully saved');

    }


}
