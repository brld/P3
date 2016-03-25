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
      $view  = '<form method="POST" action="/user-generator">';
      $view .= csrf_field();
      $view .= 'Number of people: <input type="text" name="title" value="5">';
      $view .= 'Include Address? <input type="checkbox" name="address">';
      $view .= 'Include Company? <input type="checkbox" name="company">';
      $view .= 'Include Phone number? <input type="checkbox" name="phonenumber">';
      $view .= 'Include Age? <input type="checkbox" name="age">';
      $view .= '<input type="submit">';
      $view .= '</form>';

      return $view;
    }

    public function postUser(Request $request) {
      $faker = \Faker\Factory::create();
      $numPeople = $request->input('title');
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
          echo $faker->numberBetween($min = 20, $max = 80);
          echo (", ");
        }

        echo nl2br ("\n \n");
      }


    }
}
