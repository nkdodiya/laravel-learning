<?php

namespace App\Repositories;


interface  ReviewRepositoryInterface
{

     public function givereviewbook($id);

     public function storereview(Request $request);

}
