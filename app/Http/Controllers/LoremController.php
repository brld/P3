<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class BookController extends Controller {

    /**
    * Responds to requests to GET /books
    */
    public function getIndex() {
      return 'List all the books';
    }

    /**
     * Responds to requests to GET /books/show/{id}
     */
    public function getShow($id) {
      return 'Show book: '.$id;
    }

    /**
     * Responds to requests to GET /books/create
     */
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
      return 'Here is your '.$_POST['title'].' paragraph lorem ipsum text! Coming soon!';
    }

    public function getUser() {
      $view  = '<form method="POST" action="/user-generator">';
      $view .= csrf_field();
      $view .= 'Number of people: <input type="text" name="title">';
      $view .= '<input type="submit">';
      $view .= '</form>';

      return $view;
    }

    public function postUser() {
      return 'Here are '.$_POST['title'].' people for you. Coming soon!';
    }
}
