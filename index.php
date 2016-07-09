<?php

define("HOME", "atkoTravel"); // home dir on webserver

include $_SERVER['DOCUMENT_ROOT'] . "/" . HOME . "/includes/includes.php";

$thisPage = new htmlPage();

/*** Manually add elements here ******/


$thisPage->setTitle("Tom's sweet HTML generator");

$thisPage->addElement("javascript", "https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js");

$thisPage->addToBody("<p>this is an html page.</p>");

$thisPage->display();

