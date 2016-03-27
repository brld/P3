@extends('master')

@section('title')
  Lorem Ipsum
@stop

@section('content')


@for ($i=0; $i < $numPeople; $i++)
  <?php require_once '../vendor/fzaninotto/faker/src/autoload.php'; ?>
  <p class="pname">
    <?php
    echo $faker->name;
    if ($includeAddress == TRUE || $includeCompany == TRUE || $includePhoneNumber == TRUE || $includeAge == TRUE) {
      echo (",");
    }
    ?>
  </p>
  <p>
  <?php
  if ($includeAge == TRUE) {
    echo $faker->numberBetween($min = 20, $max = 80)." years old<br>";
  }
  echo (" ");
  if ($includeAddress == TRUE) {
    echo $faker->address()."<br>";
  }
  if ($includeCompany == TRUE) {
    echo "has a job at ".$faker->company()."<br>";
  }
  if ($includePhoneNumber == TRUE) {
    echo $faker->phoneNumber();
  }

  ?>
  <br>
@endfor
</p>

<br><br><br>
@stop
