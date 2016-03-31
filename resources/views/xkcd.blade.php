@extends('master')

@section('title')
  xkcd Password
@stop

@section('content')

  <h1>xkcd Password Generator</h1>
  <form method="POST" action="/xkcd">

    {{ csrf_field() }}

    <div class="password-input">
      <label class="blocklabel">* Number of words (2 Minimum, 9 Maximum):</label>
      <div class="error">{{ $errors->first('inputWords') }}</div>
      <input
        type="text"
        id="passwordinput"
        name="inputWords"
        value="4"
        maxlength="1"
      ><br>
      <label class="blocklabel">What kind of separator?</label>
      <input type="text" name="separator" id="separator"><br>
      <input type="checkbox" name="numberGen" value="Number" id="numberGen">
      <label>Include a number?</label><br>
      <input type="checkbox" name="symbolGen" value="Symbol" id="symbolGen">
      <label>Include a symbol?</label><br>

      <button type="submit" class="btn-password">Generate</button>

      <div class="error">
        @if(count($errors) > 0)
          Whoops! Seems like there's a bit of a problem. Please correct the errors above and try again.
        @endif
      </div>
    </div>
  </form>
@stop
