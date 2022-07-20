<?php

namespace App\Repositories;


use App\Repositories\Interfaces\BookRepositoryInterface;
use Illuminate\Http\Request;
use App\Book;
use App\User;
use App\Review;
use Auth;

class BookRepository  implements BookRepositoryInterface
{
    public function getall()
    {
        $books = Book::all();
        $uid = auth()->user()->id;
        $review = Review::where('id','=',$uid)->get();;
        if($review)
            return view('index_book',compact(['books','review']));
        else
         return view('index_book', compact('books'));
    }
    public function createbook()
    {
        return view('create_book');
    }
    public function storedata($request)
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
    public function showdata($id)
    {
        $bookdata = Book::select('books.*','users.name', 'reviews.content', 'reviews.rating')
                ->leftJoin('reviews', 'books.id', '=', 'reviews.book_id')
                ->leftJoin('users', 'users.id', '=', 'reviews.id')
                ->where('books.id','=',$id)
                 ->get();


        return view('show_book',compact('bookdata'));
    }
    public function editdata($id)
    {

       $book =  Book::findOrFail($id);
       return view('edit_book', compact('book'));
    }
    public function updatedata($request, $id)
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
    public function destroydata($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return redirect('/books')->with('success', 'Book Data is successfully deleted');
    }
}
