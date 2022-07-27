
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
        <?php $flag =0; ?>
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
            <td><a href="{{ route('books.show', $case->id)}}" class="btn btn-info">Show</a></td>

            <td>

                 @if($case['reviews_count'])
                     <a  class="btn btn-success">Reviewed</a>
                @else
                    <a href="{{ route('reviews.givereview', $case->id)}}" class="btn btn-warning">Review</a>
                @endif
            </td>
            <td>
            @if($case['checkouts_count'])
             <input type="button"  class="btn btn-info" value="Isssued" disabled>
            @else
             <input type="button" id=issue{{$case->id}} onclick='getMessage({{$case->id}})' class="btn btn-success" value="Issue Book">
            @endif
            </td>
        </tr>
        @endforeach

    </tbody>
  </table>
</div></div></div>
<div>

@endsection

<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript">

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

   function getMessage(id)
   {

        $.ajax({
           type:'POST',
           url:"{{ route('checkout.issuebook') }}",
           data: {"book_id": id,"user_id":{{ Auth::user()->id}},"_token": "{{ csrf_token() }}"},
           success:function(data){
            $('#issue'+id).val(" Issued ");
            $('#issue'+id).removeClass('btn-success').addClass('btn-info');
            $('#issue'+id).attr('disabled', 'disabled');
            console.log(data);
           }
        });

	}
</script>



