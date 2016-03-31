<?php

namespace P3\Http\Controllers;

use P3\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller {

  public function getUser() {
    return view('user-generator.user');
  }

  public function postUser(Request $request) {

    /* Server side validation for user-generator input */
    $this->validate($request, [
      'people' => 'required|numeric|min:1|max:99'
    ]);

    /* Converting user input into variables */
    $numPeople = $request->input('people');
    $includeAddress = $request->input('address');
    $includeCompany = $request->input('company');
    $includePhoneNumber = $request->input('phonenumber');
    $includeAge = $request->input('age');

    /* Creating a 2-dimensional array for all of the users */
    $allUsers = [];

    $faker = \Faker\Factory::create('en_US');

    /* Generating all the users */
    for ($i=0; $i < $numPeople; $i++) {

      /* Creating a 1-dimensional array for the current
      user being generated */
      $currentUser = [];

      $currentUser["name"] = $faker->name;
      if ($includeAddress == TRUE) {
        $currentUser["address"] = $faker->address;
      }
      if ($includeCompany == TRUE) {
        $currentUser["company"] = $faker->company;
      }
      if ($includePhoneNumber == TRUE) {
        $currentUser["phonenumber"] = $faker->phoneNumber;
      }
      if ($includeAge == TRUE) {
        $currentUser["age"] = $faker->numberBetween($min = 20, $max = 80);
      }

      /* Adding the currentUser array to the allUser array */
      array_push($allUsers, $currentUser);
    }

    return view('user-generator.userpost')->with("allUsers", $allUsers);

  }

}
