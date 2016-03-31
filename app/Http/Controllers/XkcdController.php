<?php

namespace P3\Http\Controllers;

use P3\Http\Controllers\Controller;
use Illuminate\Http\Request;

class XkcdController extends Controller {

  public function getPassword() {
    return view('xkcd.xkcd');
  }

  public function postPassword(Request $request) {

    /* Server side validation for xkcd password input */
    $this->validate($request, [
      'inputWords' => 'required|numeric|min:2|max:9'
    ]);

    /* Array of possible words to use in password (23 words total) */
    $words = array("tasty", "pig", "pillow", "smart", "laptop", "couch", "red", "sharp", "pencil", "funny", "muffin", "paper", "elite", "bright", "sunny", "confused", "wet", "rough", "furry", "soft", "clean", "fast", "frisbee");

    /* Array of possible symbols to use in password (8 total) */
    $symbols = array("!","@","#","$","%","^","&","*");

    /* Array of possible numbers to use in password (9 total) */
    $numbers = array("1","2","3","4","5","6","7","8","9");

    /* Converting user input into variables */
    $inputWords = $request->input('inputWords');
    $numberGen = $request->input('numberGen');
    $symbolGen = $request->input('symbolGen');
    $separator = $request->input('separator');

    /* Several conditionals to prevent invalid input */
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

    /* Creating variables that can be called as actions later on */
    $numWords = $inputWords;
    $rand_words = array_rand($words,$numWords);
    $rand_symbols = array_rand($symbols, 1);
    $rand_numbers = array_rand($numbers, 1);

    /* Creating password variable */
    $password = "";

    /* Generating the password and adding the results to $password */
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

    return view('xkcd.xkcdpost')
      ->with('password', $password);
  }
}
