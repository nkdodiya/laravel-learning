<?php

namespace App\Repositories\interfaces;


interface  ReviewRepositoryInterface
{

     public function givereviewbook($id);

     public function storereview(Request $request);

}
