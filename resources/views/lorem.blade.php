@extends('master')

@section('title')
  Lorem Ipsum
@stop

@section('content')

  <h1>Lorem Ipsum Generator</h1>
  <form method="POST" action="/lorem-ipsum">

    {{ csrf_field() }}

    <div class="lorem-input">
      <label>* Number of paragraphs (99 Maximum):</label>
      <input
        type="text"
        id="loreminput"
        name="number"
        value="3"
        maxlength="2"
      >
      <div class="error">{{ $errors->first('number') }}</div>

      <button type="submit" class="btn-lorem">Generate</button>

      <div class="error">
        @if(count($errors) > 0)
          Whoops! Seems like there's a bit of a problem. Please correct the errors above and try again.
        @endif
      </div>
    </div>
  </form>
@stop
