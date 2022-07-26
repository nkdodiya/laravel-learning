<?php

namespace App\Repositories\interfaces;


interface  BookRepositoryInterface
{

    public function getall();


    public function storedata(Request $request);

    public function showdata($id);

    public function editdata($id);

    public function updatedata(Request $request, $id);

    public function destroydata($id);

    public function getIssued();

}
