@extends('layouts.master')


@section('welcome')

<div class="container">
    <div class="row text-center mt-5">
        <div class="title col-12 text-secondary">
            <h1>Welcome In RetajPrint WebSite </h1>
        </div>
        <div class="title col-12 text-secondary h5">
            @guest

                @if (Route::has('login'))
                    <p>To Make Any Operations Login from  <a class="" href="{{url('login')}}">here :)</a></p>
                @endif
            @endguest
        </div>
    </div>
</div>

@endsection
