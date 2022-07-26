@extends('layouts.app')

@section('content')<?php


 ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> <h1>Book Details </h1></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif



                    <div class="alert alert-success">
                        <h2>Book ::  {{$bookdata->bookname}} </h2>
                    </div>
                    <div class="card-body">
                        <h4>Author ::  {{$bookdata->author}} </h4>
                        <h4>ISBN No. ::  {{$bookdata->isbn}} </h4>
                        <h4>Published Date ::  {{$bookdata->publisheddate}} </h4>

                        <h2 class="font-medium text-base mr-auto">Download Book</h2>
                         <button>
                            <a data-feather="file"  href="{{ route('books.download', $bookdata->cover) }}" > Download</a>
                          </button>

                        @foreach($bookdata->reviews as $case)
                        <hr>
                        <h3>Review By ::  {{$case->user->name}} </h3>
                        <h3>Review ::  {{$case->content}} </h3>
                        <h3>Rating ::  {{$case->rating}} </h3>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
