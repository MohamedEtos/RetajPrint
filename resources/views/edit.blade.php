@extends('layouts.master')

@section('edit')
<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <form method="POST" action="{{route('update',$get->id)}}">
                @csrf

                <div class="form-group">
                    <label for="exampleInputEmail1">Customer Name</label>
                    <input name="cname" type="text" class="form-control" id="cname" value="{{$get->cname}}" aria-describedby="cname" placeholder="Customer Name">
                    @error('cname')
                    <small id="cname" class="form-text  text-danger">{{'* '.$message}}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Full Meter</label>
                    <input name="meter" type="number" class="form-control" value="{{$get->meter}}" id="meter" aria-describedby="meter" placeholder="Full meter">
                    @error('meter')
                    <small id="meter" class="form-text  text-danger">{{'* '.$message}}</small>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Save Update</button>

            </form>
            @if (Session::has('success'))
            <div class="alert alert-success mt-2" id="smoth">{{Session::get('success')}}  <a href="{{url('/home')}}">If You Want Back To DashBorad Click Me</a> </div>
            @endif
            @if (Session::has('faild'))
            <div class="alert alert-danger mt-2" id="smoth">{{Session::get('faild')}}</div>
            @endif

            <p class="h3 text-center" >Last Update</p>
            <table class="table table-striped mt-5">
                <thead>
                  <tr>
                    <th scope="col">N.o</th>
                    <th scope="col">Name</th>
                    <th scope="col">Meter</th>
                    <th scope="col">Time Edit</th>
                    <th scope="col">EMP Edit</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($getlast as $getlasts)
                  <tr>
                    <th>{{$getlasts->id}}</th>
                    <td>{{$getlasts->cname}}</td>
                    <td>{{$getlasts->meter}}</td>
                    <td>{{$getlasts->updated_at}}</td>
                    <td>{{$getlasts->WhoEdited}}</td>
                  </tr>
                @endforeach
                </tbody>
              </table>

        </div>
    </div>
</div>
@endsection
