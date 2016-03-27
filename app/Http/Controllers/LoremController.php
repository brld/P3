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
        'number' => 'required|min:1|max:99'
      ]);

      return view('lorempost')
        ->with('number', $request->input('number'));
    }

    public function getUser() {
      return view('user');
    }

    public function postUser(Request $request) {

      $this->validate($request, [
        'people' => 'required|min:1|max:99'
      ]);
      $data = array(
      'faker' => \Faker\Factory::create('en_US'),
      'numPeople'  => $request->input('people'),
      'includeAddress'  => $request->input('address'),
      'includeCompany' => $request->input('company'),
      'includePhoneNumber' => $request->input('phonenumber'),
      'includeAge' => $request->input('age')
      );

      return view('userpost')->with($data);

      }


    }
