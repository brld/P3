@extends('master')

@section('title')
  Your Password
@stop

@section('content')

<h1>Here is your xkcd password!</h1>
<p class="xkcd">
  <?php echo $password; ?>
</p>

<br><br><br>
@stop
