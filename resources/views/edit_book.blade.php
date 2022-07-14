
@extends('layout')

@section('content')

<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Edit Book Data
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


     <form method="post" action="{{ route('books.update', $book->id ) }}"> 
          

          <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="bookname">Book Name:</label>
              <input type="text" class="form-control" name="bookname" value="{{ $book->bookname }}"/>
          </div>
          <div class="form-group">
              <label for="author">Author :</label>
              <input  type="text" class="form-control" class="form-control" name="author" value="{{ $book->author }}">
          </div>

          <div class="form-group">
              <label for="isbn">isbn :</label>
              <input type="text" class="form-control" name="isbn" value="{{ $book->isbn }}"/>
          </div>

          <div class="form-group">
              <label for="publisheddate">Published date :</label>
              <input type="dateandtime" class="form-control" name="publisheddate" value="{{ $book->publisheddate }}"/>
          </div>
          <button type="submit" class="btn btn-primary">Edit Data</button>
      </form>
  </div>
</div>
@endsection