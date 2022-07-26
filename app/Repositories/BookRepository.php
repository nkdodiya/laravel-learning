<?php

namespace App\Repositories;


use App\Repositories\Interfaces\BookRepositoryInterface;
use Illuminate\Http\Request;
use App\Book;
use App\User;
use App\Review;
use App\checkouts;
use Auth;

class BookRepository  implements BookRepositoryInterface
{
    public function getall()
    {

        return Book::withCount(['checkouts','reviews' => function($qry){
            //return Book::with(['reviews' => function($qry){
                $uid = auth()->user()->id;
                $qry->with('user')->where("user_id", "=", $uid);
            }])->get();


    }

    public function storedata($request)
    {
        $fileName = time().'_'.$request['file']->getClientOriginalName();
        $request['file']->move(public_path('uploads'), $fileName);
        $book = new Book;
        $book->bookname = $request['bookname'];
        $book->author = $request['author'];
        $book->isbn = $request['isbn'];
        $book->publisheddate = $request['publisheddate'];
        $book->cover =$fileName;
        $book->save();
        return  Book::create($request);
    }

    public function showdata($id)
    {
        return  Book::with(['reviews','reviews.user'])->find($id);
    }

    public function editdata($id)
    {
      return  Book::findOrFail($id);
    }

    public function updatedata($request, $id)
    {
        return Book::whereId($id)->update($request);
    }

    public function destroydata($id)
    {
        return Book::findOrFail($id)->delete();
    }

    public function getIssued()
    {
        $uid = auth()->user()->id;
        return  Book::with(['checkouts' => function($query){
            $query->select('id','user_id','book_id');
            }])->get()->where("checkouts.user_id", "=", $uid);
    }


}
