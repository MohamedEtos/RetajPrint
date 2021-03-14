@extends('layouts.master')

@section('content')


<div class="container main_dash mt-5">
    <div class="row">
        <div class="col-md-3">
            <div class="total members">
                <h6>{{$countCustomers}}</h6>
                <i class=" fa fa-users user_icon"></i>
                <h6>Number Of Clients </h6>
                <a href="{{url('Orders/All')}}" class="text-reset">
                    <div class="footer_panel">
                        more info <i class="fas fa-arrow-alt-circle-right"></i>
                    </div>
                </a>
            </div>
        </div>


        <div class="col-md-3">
            <div class="total pending">
                <h6>{{$countOrders}}</h6>
                <i class="fas fa-chart-line user_icon"></i>
                <h6>Printed Orders</h6>
                <a href="{{url('Orders/All')}}" class="text-reset">
                    <div class="footer_panel">
                        more info <i class="fas fa-arrow-alt-circle-right"></i>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-md-3">
            <div class="total item">
                <h6>{{$countMeter}} </h6>
                <i class="fas fa-ruler user_icon"></i>
                <h6>Total Meter Printing</h6>
                <a href="{{url('Orders/totalmeter')}}" class="text-reset">
                    <div class="footer_panel">
                        more info <i class="fas fa-arrow-alt-circle-right"></i>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-md-3">
            <div class="total comments">
                <h6>{{$countDeleted}}</h6>
                <i class=" fa  fa-trash user_icon"></i>
                <h6>Total Orders Deleted</h6>
                    <a href="{{url('Orders/RecycleBin')}}" class="text-reset">

                    <div class="footer_panel">
                            more info <i class="fas fa-arrow-alt-circle-right"></i>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default lastes lastes_sky">
                <div class="panel-heading panel-h">
                    <i class="fa fa-users"></i>
                    <span class="h5">Lastes Orders</span>
                    <span id="Success" class="text-danger" ></span>
                    <span class="plus toggle fa-pull-right">
                        <i class="fa fa-minus"></i>
                    </span>
                </div>
                <div class="panel-body panel-b">
                    <div class="row edit_fild" style="display: none">
                        <h5 class="col-6">Ahmed ALi</h5>
                        <span class="timess text-right col-6"><i class=" times fas fa-times"></i></span>
                            <form action="" method="post">
                                <div class="col-md-12   mb-1 form-row ">
                                    <div class="form-group col-md-5">
                                        <input type="text" name="cname" value="" class="edit_name mb-1 form-control form-control-sm" placeholder="Name">
                                    </div>
                                    <div class="form-group col-md-5">
                                        <input type="text" name="" id="" class=" edit_meter mb-1 form-control form-control-sm" placeholder="Meter">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <button class="btn btn-sm btn-success btn-block w-100">Edit</button>
                                    </div>
                                </div>
                            </form>

                    </div>
                    <div class="hide" >
                    @foreach ($AllTable as $Customer)
                        <div class="row rowID{{$Customer->id}}">
                            <div class="col-md-6  text-left mb-1 testt">
                                <span href="{{url('Orders/edit/'.$Customer->id)}}" class="text-reset cname">{{$Customer->cname}}</span> <br>
                                <input type="hidden" class="meter" value="{{$Customer->meter}}" name="" id="">
                            </div>
                            <div class="col-md-6  text-right mb-1">
                                {{-- {{url('Orders/edit/'.$Customer->id)}} --}}
                                    <a  href="" class='text-reset mr-2 edit'><i class="fa fa-edit icon_scale"></i></a>
                                    <a  order_id="{{$Customer->id}}" class='text-reset mr-2 Delete'><i class="fa fa-trash icon_scale text-danger"></i></a>
                            </div>
                        </div>
                    @endforeach
                </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
            <div class="panel panel-default lastes lastes_yeallo">
                <div class="panel-heading panel-h">
                    <span class="plus toggle fa-pull-right">
                        <i class="fa fa-minus  "></i>


                    </span>
                    <i class="fas fa-chart-line"></i>
                    <span>Today</span>
                </div>
                <div class="panel-body panel-b">
                    <div class="row mb-1">
                        <div class="col-6 ">
                            <span><a href="{{url('Orders/totalmeter')}}" class="text-reset h5"></span>
                                Printed Today
                            </a>
                        </div>
                        <div class=" col-6 mt-2 h5">
                            {{$today}} Meters
                        </div>
                    </div>


                </div>
            </div>
        </div>



        <div class="col-md-6">
            <div class="panel panel-default lastes lastes_red">
                <div class="panel-heading panel-h">
                    <span class="plus toggle fa-pull-right">
                        <i class="fa fa-minus  "></i>
                    </span>
                    <i class="fa fa-comment"></i>
                    <span>Lastest Note From EMP</span>
                </div>
                <div class="panel-body panel-b">
                    <div class="row mb-1">
                        @foreach ($LastComment as $LastComments)
                        <div class="col-3 last_users_comment_div">
                            <i class="fa fa-user"></i>
                            <span class="last_users_comment">
                                {{$LastComments->EmpCommet}}
                            </span>
                        </div>
                        <div class="col-9 last_comment_div">
                            <div class="arrors_comment"></div>
                            <p class="last_comment">
                                {{$LastComments->comment}}
                            </p>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- <div class="">
    <div class="container background ">
        <div class="row">
            asdasdasd
        </div>
    </div>
</div> --}}




@endsection
@section('AdminScripts')
    <script>
        $(".Delete").click(function(e){
            e.preventDefault()

            // var formData = new FormData($('#form')[0]);
            // var orderid = $('#Delete').attr('order_id');
            $.ajax({
                type: "POST",
                url: "{{route('delete')}}",
                data: {
                    '_token':"{{csrf_token()}}",
                    'id':$(this).attr('order_id')
                },
                success: function (data) {
                    $(".rowID" + data.id).slideUp(300);
                },errors:function(){
                }
            });

        })


    // $(".edit_name").html($(".cname").val());
    $(".edit").click(function(){
        $(".edit_name").val($(".cname").html());
        $(".edit_meter").val($(".meter").val())
    })



    </script>
@endsection
