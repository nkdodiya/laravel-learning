@extends('layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                <div class="card uper">
                <div class="card-header">
                    Add book Data
                </div>
                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div><br />
                    @endif
                    <form method="post" action="{{ route('books.store') }}">
                        <div class="form-group">
                            @csrf
                            <label for="bookbname">Book Name:</label>
                            <input type="text" class="form-control" name="bookname"/>
                        </div>
                        <div class="form-group">
                            <label for="author">Author :</label>
                            <input  type="text" class="form-control" class="form-control" name="author" >

                        </div>
                        <div class="form-group">
                            <label for="isbn">Isbn :</label>
                            <input type="text" class="form-control" name="isbn" >
                        </div>

                        <div class="form-group">
                            <label for="publisheddate">Published date :</label>
                            <input type="dateandtime" class="form-control" name="publisheddate" >
                        </div>
                        <button type="submit" class="btn btn-primary">Add Data</button>
                    </form>
                </div>
                </div>
            </div>
    </div>
</div>
@endsection
