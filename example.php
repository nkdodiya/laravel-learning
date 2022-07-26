<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Repositories\Interfaces\BookRepositoryInterface;
use Illuminate\Http\Request;
use App\Book;
use App\User;
use App\Review;
use Auth;

class BookController extends Controller
{

    public function __construct(BookRepositoryInterface $bookRepository){

        $this->repository = $bookRepository;
      }
    public function index()
    {

        $book = $this->repository->getAll();
        return view('index_book',['books' => $book]);

    }

    public function create()
    {
        return view('create_book');

    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'bookname' => 'required|max:255',
            'author' => 'required',
            'isbn' => 'required|numeric',
            'publisheddate' => 'required|date_format:Y-m-d H:i:s|after_or_equal:' . date(DATE_ATOM),
        ]);

        $book =  $this->repository->storedata($validatedData);
        return redirect('/books')->with('success', 'Book is successfully saved');
    }


    public function show($id)
    {
        $bookdata=  $this->repository->showdata($id);

         return view('show_book',['bookdata' => $bookdata]);
    }

    public function edit($id)
    {
        if(!$book =  $this->repository->isExist($id)){
            return abort();
        }


        $book->bookname = "test";

        dd($book->save());






        $book =  $this->repository->editdata($id);
        return view('edit_book',['book'=>$book]);
    }

    public function update(Request $request, $id)
    {
        if(!$book =  $this->repository->isExist($id)){
            return abort();
        }

        $validatedData = $request->validate([
            'bookname' => 'required|max:255',
            'author' => 'required',
            'isbn' => 'required|numeric',
            'publisheddate' => 'required|date_format:Y-m-d H:i:s|after_or_equal:' . date(DATE_ATOM),
        ]);
        $book =  $this->repository->updatedata($book,$validatedData);
        return redirect('/books')->with('success', 'Book Data is successfully updated');
    }


    public function destroy($id)
    {
        $book =  $this->repository->destroydata($id);

        return redirect('/books')->with('success', 'Book Data is successfully deleted');
    }

}
