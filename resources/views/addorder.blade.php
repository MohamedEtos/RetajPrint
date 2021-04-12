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
                    <input list="brow" name="cname" class="form-control" placeholder="يرجي التاكد ان اسم العميل موجود بالفعل" type="text">
                    <datalist id="brow">
                        @foreach ($comeData as $data)
                        <option value="{{$data->cname}}">
                        @endforeach
                    </datalist>
                    <small id="cname_error" class="form-text  text-danger"></small>
                </div>


                <div class="form-row">
                    <div class="form-group col-4">
                        <label for="exampleInputEmail1">Y Copy</label>
                        <input name="Ycopy" type="number" class="form-control" id="ycopy" aria-describedby="meter" onkeyup="result()" placeholder="تكرار">
                        <small id="Ycopy_error" class="form-text  text-danger"></small>
                    </div>
                    <div class="form-group col-4">
                        <label for="exampleInputEmail1">File Height</label>
                        <input name="FileHight" type="number" class="form-control" value="" id="FileHight" onkeyup="result()" aria-describedby="meter" placeholder="طول الملف">
                        <small id="FileHight_error" class="form-text  text-danger"></small>
                    </div>
                    <div class="form-group col-4">
                        <label for="exampleInputEmail1">Full Meter</label>
                        <input name="meter" type="number" class="form-control" id="fullmeter" aria-describedby="meter"   placeholder="اجمالي الامتار">
                        <small id="meter_error" class="form-text  text-danger"></small>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-4">
                        <label for="exampleInputEmail1">Type</label>
                        <input name="type" type="text" class="form-control" id="type"  aria-describedby="type" placeholder="قطع / اتواب / بدجات">
                        <small id="type_error" class="form-text  text-danger"></small>
                    </div>
                    <div class="form-group col-4">
                        <label for="exampleInputEmail1">Printer</label>
                        <select name="Printer" id="Printer" class="form-control select">
                            <option value="fedar">Fedar</option>
                            <option value="sky">Sky Color</option>
                            <option value="grand">Grand</option>
                        </select>
                        <small id="Printer_error" class="form-text  text-danger"></small>
                    </div>
                    <div class="form-group col-4">
                        <label for="exampleInputEmail1">Commint</label>
                        <input name="note" type="text" class="form-control" id="meter" aria-describedby="note" placeholder="ملاخظات">
                        <small id="note_error" class="form-text  text-danger"></small>
                    </div>

                </div>

                <div class=" row justify-content-center">
                    <button type="submit" id="SubmitFormAddOrder" class="btn btn-primary btn_smoth col-3 mr-2 mb-2">Save Data</button>
                    <a  class="btn btn-outline-danger btn_smoth col-3 mb-2" href="{{url('/home')}}">Back</a>
                </div>


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
            $("#Ycopy_error").text('');
            $("#FileHight_error").text('');
            $("#type_error").text('');
            $.ajax({
                type: "POST",
                url: "{{route('AddOrders')}}",
                data : formData,
                processData:false,
                contentType:false,
                cache:false,
                success: function (data) {
                    $("#Success").html(data.MSG).slideDown("fast").delay(2000).slideUp("fast");
                    $("input[name=Ycopy]").val("")


                },error: function(reject){
                    var response = $.parseJSON(reject.responseText);
                    $.each(response.errors,function(key,val){
                        $("#" + key + "_error").text(val[0]);

                    })

                }
            });

        });



function result (){
var result_m =    document.getElementById("fullmeter");
var repeat_file = document.getElementById("ycopy").value;
var height_file = document.getElementById("FileHight").value;

    result_m.value = repeat_file * height_file/100 ;

};

</script>
@endsection

