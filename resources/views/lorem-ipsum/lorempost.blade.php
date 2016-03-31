@extends('master')

@section('title')
  Random Users
@stop

@section('content')

<h1>Here is your Lorem Ipsum!</h1>
<p>

  {{-- Outputting the lorem ipsum for the user --}}
  <?php echo implode('<p>', $paragraphs); ?>
</p>
<br><br><br>
@stop
