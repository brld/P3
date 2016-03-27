@extends('master')

@section('title')
  Random Users
@stop

@section('content')

<p>
<?php
$generator = new \Badcow\LoremIpsum\Generator();
$paragraphs = $generator->getParagraphs($number);
echo implode('<p>', $paragraphs);

?>

<br><br><br>
@stop
