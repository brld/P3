@extends('master')

@section('title')
  Lorem Ipsum
@stop

@section('content')



  @foreach ($allUsers as $index)
  <p class="pname">
    {{$index['name']}}
  </p>
  <p>
    {{$index['address']}}<br>
    Works at {{$index['company']}}<br>
    {{$index['phonenumber']}}<br>
    {{$index['age']}} years old<br>
  <br>
  @endforeach
  </p>

<br><br><br>
@stop
