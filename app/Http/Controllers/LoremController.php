<?php

namespace P3\Http\Controllers;

use P3\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoremController extends Controller {
    public function getLorem() {
      return view('lorem');
    }

    /**
     * Responds to requests to POST /books/create
     */
    public function postLorem(Request $request) {
      $this->validate($request, [
        'number' => 'required|numeric|min:1|max:99'
      ]);

      return view('lorempost')
        ->with('number', $request->input('number'));
    }

    public function getUser() {
      return view('user');
    }

    public function postUser(Request $request) {

      $this->validate($request, [
        'people' => 'required|numeric|min:1|max:99'
      ]);

      $numPeople = $request->input('people');
      $includeAddress = $request->input('address');
      $includeCompany = $request->input('company');
      $includePhoneNumber = $request->input('phonenumber');
      $includeAge = $request->input('age');

      $allUsers = [];
      $faker = \Faker\Factory::create('en_US');

      for ($i=0; $i < $numPeople; $i++) {
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

        array_push($allUsers, $currentUser);
      }

      return view('userpost')->with("allUsers", $allUsers);

      }


    }
