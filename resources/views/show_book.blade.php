@extends('layouts.app')

@section('content')


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


                    @foreach($bookdata as $case)
                    <div class="alert alert-success">
                        <h2>Book ::  {{$case->bookname}} </h2>
                    </div>
                    <div class="card-body">
                        <h4>Author ::  {{$case->author}} </h4>
                        <h4>ISBN No. ::  {{$case->isbn}} </h4>
                        <h4>Published Date ::  {{$case->publisheddate}} </h4>
                        <hr>
                        <h3>Review By ::  {{$case->name}} </h3>
                        <h3>Review ::  {{$case->content}} </h3>
                        <h3>Rating ::  {{$case->rating}} </h3>

                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
