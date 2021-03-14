@extends('layouts.master')

@section('addOrder')
<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <form id="addOrder">
                @csrf
                {{-- @if (Session::has('storedone')) --}}
                <div class="text-success smoth mt-3 " id="Success" ></div>
                {{-- @endif --}}

                <div class="form-group">
                    <label for="exampleInputEmail1">Customer Name</label>
                    <input list="brow" name="cname" class="form-control">
                    <datalist id="brow">
                        @foreach ($comeData as $data)
                        <option value="{{$data->cname}}">
                        @endforeach
                    </datalist>
                    <small id="cname_error" class="form-text  text-danger"></small>
                </div>



                <div class="form-group">
                    <label for="exampleInputEmail1">Full Meter</label>
                    <input name="meter" type="number" class="form-control" id="meter" aria-describedby="meter" placeholder="Full meter">
                    <small id="meter_error" class="form-text  text-danger"></small>
                </div>

                <button type="submit" id="SubmitFormAddOrder" class="btn btn-primary btn_smoth">Save Data</button>

            </form>

        </div>

    </div>
</div>

@endsection

@section('AddOrderScript')
<script>
        $("#SubmitFormAddOrder").click(function(e){
            e.preventDefault();


            var formData = new FormData($('#addOrder')[0]);
            $("#cname_error").text('');
            $("#meter_error").text('');
            $.ajax({
                type: "POST",
                url: "{{route('AddOrders')}}",
                data : formData,
                processData:false,
                contentType:false,
                cache:false,
                success: function (data) {
                    $("#Success").html(data.MSG).slideDown("fast").delay(2000).slideUp("fast");
                    $("input[name=meter]").val("").attr("placeholder","If you Want Add More Order To This Customer Type Here");
                    

                },error: function(reject){
                    var response = $.parseJSON(reject.responseText);
                    $.each(response.errors,function(key,val){
                        $("#" + key + "_error").text(val[0]);
                    })

                }
            });

        });

</script>
@endsection

