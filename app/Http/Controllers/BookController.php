<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Book;
use App\User;
use Auth;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $books = Book::all();
        $uid = auth()->user()->id;
        if($review=DB::table('Reviews')->where('id' , $uid)->get())
        {

            return view('index_book', compact(['books','review']));

        }

        else
         return view('index_book', compact('books'));



    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create_book');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $validatedData = $request->validate([
            'bookname' => 'required|max:255',
            'author' => 'required',
            'isbn' => 'required|numeric',
            'publisheddate' => 'required|date_format:Y-m-d H:i:s|after_or_equal:' . date(DATE_ATOM),
        ]);

        $show = Book::create($validatedData);

        return redirect('/books')->with('success', 'Book is successfully saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

         $bookdata= DB::table('books')

        ->leftJoin('reviews', 'books.id', '=', 'reviews.book_id')
        ->leftJoin('users', 'users.id', '=', 'reviews.id')
        ->select('books.*','users.name', 'reviews.content', 'reviews.rating')
        ->where('books.id','=',$id)
        ->get();
        return view('show_book',compact('bookdata'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $book = Book::findOrFail($id);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $validatedData = $request->validate([
            'bookname' => 'required|max:255',
            'author' => 'required',
            'isbn' => 'required|numeric',
            'publisheddate' => 'required|date_format:Y-m-d H:i:s|after_or_equal:' . date(DATE_ATOM),
        ]);
        Book::whereId($id)->update($validatedData);

        return redirect('/books')->with('success', 'Book Data is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return redirect('/books')->with('success', 'Book Data is successfully deleted');
    }

}
