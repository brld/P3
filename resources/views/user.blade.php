@extends('master')

@section('title')
  Random Users
@stop

@section('content')

  <h1>Random User Generator</h1>
  <form method="POST" action="/user-generator">

    {{ csrf_field() }}

    <div class="user-input">
      <label>* Number of people (99 Maximum):</label>
      <input
        type="text"
        id="userinput"
        name="people"
        value="5"
        maxlength="2"
      >
      <div class="error">{{ $errors->first('people') }}</div>

      <label>Include Address?</label>
      <input
        type="checkbox"
        id="userinput"
        name="address"
      >
      <div class="error">{{ $errors->first('address') }}</div>

      <label>Include Company?</label>
      <input
        type="checkbox"
        id="userinput"
        name="company"
      >
      <div class="error">{{ $errors->first('company') }}</div>

      <label>Include Phone Number?</label>
      <input
        type="checkbox"
        id="userinput"
        name="phonenumber"
      >
      <div class="error">{{ $errors->first('phonenumber') }}</div>

      <label>Include Age?</label>
      <input
        type="checkbox"
        id="userinput"
        name="age"
      >
      <div class="error">{{ $errors->first('age') }}</div>

      <button type="submit" class="btn-users">Generate</button>

      <div class="error">
        @if(count($errors) > 0)
          Whoops! Seems like there's a bit of a problem. Please correct the errors above and try again.
        @endif
      </div>
    </div>
  </form>
@stop
