<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Repositories\Interfaces\CheckoutRepositoryInterface;
use Illuminate\Http\Request;
use App\Book;
use App\User;
use App\Review;
use Auth;

class CheckoutController extends Controller
{

    public function __construct(CheckoutRepositoryInterface $checkoutRepository){

        $this->repository = $checkoutRepository;
      }
      public function issuebook(Request $request)
    {

        $checkout = $this->repository->giveissue($request);
        return $checkout;
       // return view('givereview',['id' => $id]);


    }
    public function returnbook(Request $request)
    {

      return $this->repository->returned($request);
    }

}
