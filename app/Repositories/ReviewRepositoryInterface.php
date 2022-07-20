<?php

namespace App\Repositories;

use NamTran\LaravelMakeRepositoryService\Repository\RepositoryContract;

interface ReviewRepositoryInterface extends RepositoryContract
{
     public function getAllreview();

     public function givereviewbook($id);

     public function createreview();

     public function storereview(Request $request);

}
