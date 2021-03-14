@extends('layouts.master')
@section('Comment')
{{-- <div class="container mt-5">
    <div class="row">
      <div class="col-12">
        @if (Session::has('CommentSuc'))
            <div class="alert alert-success" id="smoth"role="alert">
                {{Session('CommentSuc')}}
            </div>
        @endif
       <form action="{{url('Comment/StoreComment')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">New Comment</label>
            <input name="newcomment" type="text" class="form-control" id="newcomment"  aria-describedby="newcomment" placeholder="Type Comment Here">
            @error('newcomment')
            <small id="newcomment" class="form-text  text-danger">{{'* '.$message}}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-sm btn-primary">Save Comment</button>
       </form>
      </div>

    </div>
</div> --}}
<div class="container mt-5">
    <div class="row">
      <div class="col-12">

        <div class=" h4 hide" role="alert" style="display: none"></div>

       <form id="form">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">New Comment</label>
            <input name="newcomment" type="text" class="form-control" id="newcomment"  aria-describedby="newcomment" placeholder="Type Comment Here">
            @error('newcomment')
            <small id="newcomment" class="form-text  text-danger">{{'* '.$message}}</small>
            @enderror
        </div>
        <button id='saveComment' type="submit" class="btn btn-sm btn-primary">Save Comment</button>
       </form>
      </div>

    </div>
</div>
@endsection

@section('AddCommentScript')
<script>

$('#saveComment').click(function(event){
    // Stop the browser from submitting the form.
    event.preventDefault();

    var formData = new FormData($('#form')[0]);

            $.ajax({
                type: 'POST',
                url: "{{route('StoreComment')}}",
                data : formData,
                processData:false,
                contentType:false,
                cache:false,
                success: function (data) {
                            $('.hide').html(data.MSG).addClass('text-success').slideDown(200).delay(2000).slideUp(200
                        ,function () {
                            $('input[name="newcomment"]').val("")
                            $('.hide').removeClass("text-success")
                        });
                },error:function(data){
                    var errors = data.responseJSON;
                        $('.hide').html(errors.message).addClass('text-danger').slideDown(300).delay(3000).slideUp(300
                    ,function () {
                        $('input[name="newcomment"]')
                        $('.hide').removeClass("text-danger")
                    });
                }
            });

});



</script>
@endsection
