<?php

namespace P3\Http\Controllers;

use P3\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoremController extends Controller {

  public function getLorem() {
    return view('lorem-ipsum.lorem');
  }

  public function postLorem(Request $request) {

    /* Server side validation for lorem-ipsum input */
    $this->validate($request, [
      'number' => 'required|numeric|min:1|max:99'
    ]);

    /* Generating password and storing it in $paragraphs */
    $number = $request->input('number');
    $generator = new \Badcow\LoremIpsum\Generator();
    $paragraphs = $generator->getParagraphs($number);

    return view('lorem-ipsum.lorempost')
      ->with('paragraphs', $paragraphs);
  }

}
