<?php

namespace P3\Http\Controllers;

use P3\Http\Controllers\Controller;

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
      $view .= 'Number of people: <input type="text" name="title">';
      $view .= '<input type="submit">';
      $view .= '</form>';

      return $view;
    }

    public function postUser() {
      return 'Here are '.$_POST['title'].' people for you. Coming soon!';
    }
}
