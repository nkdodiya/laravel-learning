<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Repositories\Interfaces\BookRepositoryInterface;
use Illuminate\Support\Facades\Storage;
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
            'file' => 'required|mimes:pdf,xlx,csv|max:2048',
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
        $book =  $this->repository->editdata($id);
        return view('edit_book',['book'=>$book]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'bookname' => 'required|max:255',
            'author' => 'required',
            'isbn' => 'required|numeric',
            'publisheddate' => 'required|date_format:Y-m-d H:i:s|after_or_equal:' . date(DATE_ATOM),
            'file' => 'required|mimes:pdf,xlx,csv|max:2048',
        ]);
        $fileName = time().'.'.$request->file->extension();

        $request->file->move(public_path('uploads'), $fileName);
        $book =  $this->repository->updatedata($validatedData,$id);
        return redirect('/books')->with('success', 'Book Data is successfully updated');
    }


    public function destroy($id)
    {
        $book =  $this->repository->destroydata($id);

        return redirect('/books')->with('success', 'Book Data is successfully deleted');
    }
    public function download($fileName)
    {
        return Storage::download('public/'.$fileName);
    }

    public function listissed()
    {

        $book = $this->repository->getIssued();
       return view('issued_book',['books' => $book]);
    }

}
