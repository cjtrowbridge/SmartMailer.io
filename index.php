<?php

include('core/Loader.php');
Loader();

if(file_exists('core/Config.php')){
  include('core/Config.php');
}else{
  die('Need to create config file!');
}

if(LoggedIn()){

  Event('Logged In');
  Event('Logged In - Page');
  Error404();

}else{

  Event('Not Logged In');
  Event('Not Logged In - Page');
  Error404();

}
