<?php

namespace App\Repositories;


use App\Repositories\Interfaces\BookRepositoryInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Storage;
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

        $filenameWithExt = $request['file']->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = $request['file']->getClientOriginalExtension();
        $fileNameToStore = $filename.'_'.time().'.'.$extension;
        $path = $request['file']->storeAs('public',$fileNameToStore);
        $request['cover'] = $fileNameToStore ;

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

     //$x  = Book::with(['checkouts:id,user_id,book_id'])->get()->where("checkouts.user_id","=",13);
        return Book::with('checkouts:id,user_id,book_id')->whereHas('checkouts', function (Builder $query) {
            $uid = auth()->user()->id;
            $query->where('user_id', '=', $uid);
           })->get();


    }


}
