<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Review;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $review = Review::all();

        return view('index_review', compact('review'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function givereview($id)
    {

        return view('givereview',['id' => $id]);


    }
    public function create()
    {
        return 'done';
    }
    public function store(Request $request)
    {

        $input = $request->all();

        $show = Review::create($input);
        return redirect('/books')->with('success', 'Book review is successfully saved');

    }


}
