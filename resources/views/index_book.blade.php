
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


<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}
    </div><br />
  @endif
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Book Name</td>
          <td>author</td>
          <td>isbn</td>
          <td>published Date</td>
          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($books as $case)
        <tr>
            <td>{{$case->id}}</td>
            <td>{{$case->bookname}}</td>
            <td>{{$case->author}}</td>
            <td>{{$case->isbn}}</td>
             <td>{{$case->publisheddate}}</td>
            <td><a href="{{ route('books.edit', $case->id)}}" class="btn btn-primary">Edit</a></td>
            <td>
                <form action="{{ route('books.destroy', $case->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>

            <td>
                <a href="{{ route('reviews.givereview', $case->id)}}" class="btn btn-primary">Review</a>
            </td>

        </tr>
        @endforeach
    </tbody>
  </table>
</div></div></div>
<div>
@endsection


