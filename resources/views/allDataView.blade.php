@extends('layouts.master')

@section('viewAllData')
    <div class="container mt-5">
        <div class="row">
            <table class="table table-striped text-center">
                <thead>
                  <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Meter</th>
                    <th scope="col">EMP</th>
                    <th scope="col">Created At <i class="far fa-calendar-alt"></i></th>
                    <th scope="col">Last Update <i class="far fa-calendar-alt"></i></th>
                    <th scope="col">WhoEdited <i class="fas fa-user"></i></th>
                    <th scope="col">Opraction <i class="fas fa-edit"></i></th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($comeData as $data)
                    <tr>
                        <th scope="row">{{$data->id}}</th>
                        <td>{{$data->cname}}</td>
                        <td>{{$data->meter}}</td>
                        <td>{{$data->EMP}}</td>
                        <td>{{$data->created_at}}</td>
                        @if ($data->created_at == $data->updated_at)
                        <td>--</td>
                        @else
                        <td>{{$data->updated_at}}</td>
                        @endif
                        <td>{{$data->WhoEdited}}</td>
                        <td>
                            <form action="{{route('deletelaravel',$data->id)}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <a href="{{url('Orders/edit/'.$data->id)}}" class="col-5 btn btn-sm btn-info">Edit <i class="fa fa-edit"></i></a>
                                    <button type="submit" class="col-6 btn btn-sm btn-danger">Delete <i class="float-right fa fa-trash"></i></button>
                                </div>
                            </form>
                        </td>
                      </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
    </div>
@endsection
