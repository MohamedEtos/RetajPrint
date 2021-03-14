@extends('layouts.master')

@section('orderDeleted')
<div class="container mt-5">
    <div class="row">
        <table class="table table-striped text-center">
            <thead>
              <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Meter</th>
                <th scope="col">EMP</th>
                <th scope="col">Created At</th>
                <th scope="col">Last Update</th>
                <th scope="col">WhoDelete</th>
                <th scope="col">Opraction</th>
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
                    <td>{{$data->updated_at}}</td>
                    <td>{{$data->WhoDelete}}</td>
                    <td>
                        <form action="{{url('Orders/restore/'.$data->id)}}" method="POST">
                            @csrf
                            {{-- <a href="{{url('Orders/edit/'.$data->id)}}" class="col-5 btn btn-sm btn-info">Restore</a> --}}
                            <button type="submit" class=" btn btn-sm btn-info">Restore <i class="fas fa-trash-restore"></i></button>
                        </form>
                    </td>
                  </tr>
                @endforeach
            </tbody>
          </table>

    </div>
</div>
@endsection
