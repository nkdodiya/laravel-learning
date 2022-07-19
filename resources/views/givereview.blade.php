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
                    Add Review Data
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
                    <form method="post" action="{{ route('reviews.store') }}">
                        @csrf
                        <input  type="hidden" class="form-control" class="form-control" name="id" value ="{{ Auth::user()->id }}" >
                        <input  type="hidden" class="form-control" class="form-control" name="book_id" value ="{!! $id !!}" >

                       <div class="form-group">
                            <label for="content">content :</label>
                            <input  type="text" class="form-control" class="form-control" name="content" >

                        </div><br>
                        <div class="form-group">
                            <label for="rating">rating :</label>
                            <select name="rating" id="rating">
                                <option value= "1">1</option>
                                <option value= "2">2</option>
                                <option value= "3">3</option>
                                <option value= "4">4</option>
                                <option value= "5">5</option>
                            </select>
                        </div>
                        <br>

                        <button type="submit" class="btn btn-primary">Add Data</button>
                    </form>
                </div>
                </div>
            </div>
    </div>
</div>
@endsection
