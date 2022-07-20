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

        return $this->repository->getAll();
    }

    public function create()
    {
        return $this->repository->createbook();

    }

    public function store(Request $request)
    {
        return $this->repository->storedata($request);
    }


    public function show($id)
    {
        return $this->repository->showdata($id);
    }


    public function edit($id)
    {
        return $this->repository->editdata($id);
    }


    public function update(Request $request, $id)
    {
        return $this->repository->updatedata($request,$id);
    }


    public function destroy($id)
    {
        return $this->repository->destroydata($id);
    }

}
