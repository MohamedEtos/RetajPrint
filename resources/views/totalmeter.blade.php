@extends('layouts.master')
@section('TotalMeter')
<div class="container mt-5">
    <div class="row">
        <table class="table table-striped text-center">
            <thead>
              <tr>
                <th scope="col">Date</th>
                <th scope="col">Meter</th>
              </tr>
            </thead>
            <tbody>
                {{-- @foreach ($data as $datas) --}}
                <tr>
                    <th scope="row">today</th>
                    <th scope="row">{{$data}}</th>
                  </tr>
                {{-- @endforeach --}}
            </tbody>
          </table>
    </div>
</div>

@endsection
