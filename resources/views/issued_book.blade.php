
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

    @php //dd($books->toArray());
     @endphp
  @if($books->isEmpty())
  <div class="alert alert-success"> You have not issued any book......</div>
  @else
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Book Name</td>
          <td>author</td>

          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($books as $case)
        <?php $flag =0; ?>
        <tr id="issuebook{{$case->id}}">
            <td>{{$case->id}}</td>
            <td>{{$case->bookname}}</td>
            <td>{{$case->author}}</td>

            <td><input type="button" id=issue{{$case->id}} onclick='returnbook({{$case->checkouts[0]->id}})' class="btn btn-success" value="Return Book"></td>
        </tr>
        @endforeach

    </tbody>
  </table>
  @endif
</div></div></div>
<div>

@endsection

<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript">
   function returnbook(id)
   {
        $.ajax({
           type:'POST',
           url:"{{ route('checkout.returnbook') }}",
           data: {"id": id,"_token": "{{ csrf_token() }}"},
           success:function(data){
            location.reload();
            //$('#issuebook'+id).hide();
           }
        });

	}
</script>



