@extends('master')

@section('title')
  Your Random Users
@stop

@section('content')



  <h1>Here are your Random Users!</h1>
  @foreach ($allUsers as $index)
  <p class="pname">
    {{$index['name']}}
    <?php unset($index['name']); ?>
  </p>
  <p>
    @foreach ($index as $value)
      <?php
      if (array_key_exists('address', $index)) {
        if ($value == $index['address']) {
          echo $value;
          echo nl2br("\n");
        }
      }
      if (array_key_exists('company', $index)) {
        if ($value == $index['company']) {
          echo "Works at ".$value;
          echo nl2br("\n");
        }
      }
      if (array_key_exists('phonenumber', $index)) {
        if ($value == $index['phonenumber']) {
          echo $value;
          echo nl2br("\n");
        }
      }
      if (array_key_exists('age', $index)) {
        if ($value == $index['age']) {
          echo $value." years old";
          echo nl2br("\n");
        }
      }
      ?>
    @endforeach
  <br>
  @endforeach
  </p>

<br><br><br>
@stop
