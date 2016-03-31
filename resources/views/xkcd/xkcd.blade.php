@extends('master')

@section('title')
  xkcd Password
@stop

@section('content')

  <h1>xkcd Password Generator</h1>
  <form method="POST" action="/xkcd">

    {{ csrf_field() }}

    {{-- NOTE: I add the possibility to generate errors for all
      of the inputs although I do not use any of them (other then
      the text input) as it will make it easier to activate them
      later if I do need to generate errors for all of them. --}}

    <div class="input">
      <label class="blocklabel">* Number of words (2 Minimum, 9 Maximum):</label>

      {{-- Errors outputted below for easier reading by the user --}}

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

      <button type="submit" class="btn-submit">Generate</button>

      <div class="error">
        @if(count($errors) > 0)
          Whoops! Seems like there's a bit of a problem. Please correct the errors above and try again.
        @endif
      </div>
    </div>
  </form>
@stop
