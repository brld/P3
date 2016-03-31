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

      $number = $request->input('number');
      $generator = new \Badcow\LoremIpsum\Generator();
      $paragraphs = $generator->getParagraphs($number);

      return view('lorempost')
        ->with('paragraphs', $paragraphs);
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

      public function getPassword() {
        return view('xkcd');
      }

      public function postPassword(Request $request) {
        $this->validate($request, [
          'inputWords' => 'required|numeric|min:2|max:9'
        ]);

        $words = array("tasty", "pig", "pillow", "smart", "laptop", "couch", "red", "sharp", "pencil", "funny", "muffin", "paper", "elite", "bright", "sunny", "confused", "wet", "rough", "furry", "soft", "clean", "fast", "frisbee");
        $symbols = array("!","@","#","$","%","^","&","*");
        $numbers = array("1","2","3","4","5","6","7","8","9");
        $inputWords = $request->input('inputWords');
        $numberGen = $request->input('numberGen');
        $symbolGen = $request->input('symbolGen');
        $separator = $request->input('separator');
        if (strlen($separator) == 0) {
          $separator = "- ";
        }
        if (! ctype_digit($inputWords)) {
          if (! strlen($inputWords) == 0) {
            $inputWords = 4;
            echo nl2br ("Not an integer, generating default 4 word password.");
          }
        }
        if (strlen($inputWords) == 0) {
          $inputWords = 4;
        }

        if ($inputWords == 1) {
          $inputWords = 2;
          echo nl2br ("Not a valid length, generating default word password.");
        }
        $numWords = $inputWords;
        $rand_words = array_rand($words,$numWords);
        $rand_symbols = array_rand($symbols, 1);
        $rand_numbers = array_rand($numbers, 1);
        $password = "";
        for ($i = 0; $i < $numWords; $i++) {
          $password .= $words[$rand_words[$i]]." ";
          if ($i < $numWords - 1) {
            $password .= $separator." ";
          }
        }
        if ($symbolGen == TRUE) {
          $password .= $symbols[$rand_symbols];
        }
        if ($numberGen == TRUE) {
          $password .= $numbers[$rand_numbers];
        }

        return view('xkcdpost')
          ->with('password', $password);
      }


    }
