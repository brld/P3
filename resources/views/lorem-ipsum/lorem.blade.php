@extends('master')

@section('title')
  Lorem Ipsum
@stop

@section('content')

  <h1>Lorem Ipsum Generator</h1>
  <form method="POST" action="/lorem-ipsum">

    {{ csrf_field() }}

    <div class="input">
      <label class="blocklabel">* Number of paragraphs (99 Maximum):</label>

      {{-- Errors outputted below for easier reading by the user --}}

      <div class="error">{{ $errors->first('number') }}</div>
      <input
        type="text"
        id="loreminput"
        name="number"
        value="3"
        maxlength="2"
      >

      <button type="submit" class="btn-submit">Generate</button>

      <div class="error">
        @if(count($errors) > 0)
          Whoops! Seems like there's a bit of a problem. Please correct the errors above and try again.
        @endif
      </div>
    </div>
  </form>
@stop
