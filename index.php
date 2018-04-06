<?php

include('Event.php');
include('Query.php');
include('Mail.php');
include('Session.php');

if(file_exists('Config.php')){
  include('Config.php');
}else{
  die('Need to create config file!');
}

if(LoggedIn()){

  Event('Logged In');
  Event('Logged In - Page');
  404();

}else{

  Event('Not Logged In');
  Event('Not Logged In - Page');
  404();

}
