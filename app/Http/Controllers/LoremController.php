<?php

namespace P3\Http\Controllers;

use P3\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoremController extends Controller {
    public function getLorem() {
      $view  = '<form method="POST" action="/lorem-ipsum">';
      $view .= csrf_field();
      $view .= 'Number of paragraphs: <input type="text" name="title">';
      $view .= '<input type="submit">';
      $view .= '</form>';

      return $view;
    }

    /**
     * Responds to requests to POST /books/create
     */
    public function postLorem() {
      $generator = new \Badcow\LoremIpsum\Generator();
      $paragraphs = $generator->getParagraphs($_POST['title']);
      echo implode('<p>', $paragraphs);
    }

    public function getUser() {
      return view('user');
    }

    public function postUser(Request $request) {
      $faker = \Faker\Factory::create();
      $numPeople = $request->input('people');
      $includeAddress = $request->input('address');
      $includeCompany = $request->input('company');
      $includePhoneNumber = $request->input('phonenumber');
      $includeAge = $request->input('age');
      for ($i=0; $i < $numPeople; $i++) {
        echo $faker->name;
        if ($includeAddress == TRUE || $includeCompany == TRUE || $includePhoneNumber == TRUE || $includeAge == TRUE) {
          echo (",");
        }
        echo (" ");
        if ($includeAddress == TRUE) {
          echo $faker->address;
          echo (", ");
        }
        if ($includeCompany == TRUE) {
          echo $faker->company;
          echo (", ");
        }
        if ($includePhoneNumber == TRUE) {
          echo $faker->phoneNumber;
          echo (", ");
        }
        if ($includeAge == TRUE) {
          echo $faker->numberBetween($min = 20, $max = 80)." years old";
          echo (", ");
        }

        echo nl2br ("\n \n");
      }


    }
}
