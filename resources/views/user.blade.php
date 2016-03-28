@extends('master')

@section('title')
  Random Users
@stop

@section('content')

  <h1>Random User Generator</h1>
  <form method="POST" action="/user-generator">

    {{ csrf_field() }}

    <div class="user-input">
      <label class="blocklabel">* Number of people (99 Maximum):</label>
      <div class="error">{{ $errors->first('people') }}</div>
      <input
        type="text"
        id="userinput"
        name="people"
        value="5"
        maxlength="2"
      >

      <div></div>
      <input
        type="checkbox"
        id="userinput"
        name="address"
      >
      <label>Include Address?</label>
      <div class="error">{{ $errors->first('address') }}</div>

      <input
        type="checkbox"
        id="userinput"
        name="company"
      >
      <label>Include Company?</label>
      <div class="error">{{ $errors->first('company') }}</div>

      <input
        type="checkbox"
        id="userinput"
        name="phonenumber"
      >
      <label>Include Phone Number?</label>
      <div class="error">{{ $errors->first('phonenumber') }}</div>

      <input
        type="checkbox"
        id="userinput"
        name="age"
      >
      <label>Include Age?</label>
      <div class="error">{{ $errors->first('age') }}</div>

      <button type="submit" class="btn-users">Generate</button>

      <div class="error">
        @if(count($errors) > 0)
          It seems like there's a bit of a problem. Please correct the errors above and try again.
        @endif
      </div>
    </div>
  </form>
@stop
