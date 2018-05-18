<?php

include('core/Loader.php');
Loader();

if(file_exists('core/Config.php')){
  include('core/Config.php');
}else{
  die('Need to create config file!');
}

?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>SmartMailer.io</title>
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css" integrity="sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" integrity="sha384-3ceskX3iaEnIogmQchP8opvBy3Mi7Ce34nWjpBIwVTHfGYWQS9jwHDVRnpKKHJg7" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.3.7/js/tether.min.js" integrity="sha384-XTs3FgkjiBgo8qjEjBk0tGmf3wPrWtA6coPfQDfFEY8AnYJwjalXCiosYRBIBZX8" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/js/bootstrap.min.js" integrity="sha384-BLiI7JTZm+JWlgKa0M0kGRpJbF2J8q+qreVrKBC47e3K6BW78kGLrCkeRX6I9RoK" crossorigin="anonymous"></script>
  
  <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.10.0/jquery.timepicker.min.js"></script>
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.28.8/js/jquery.tablesorter.combined.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.28.8/css/theme.ice.min.css">

</head>

<body>

  <nav class="navbar navbar-fixed-top navbar-dark bg-primary container">
    <a class="navbar-brand" href="https://smartmailer.io">SmartMailer.io</a>
    <ul class="nav navbar-nav">
      
    </ul>
  </nav>

  <div class="container">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <p>&nbsp;</p>
          <h1><a href="https://github.com/cjtrowbridge/SmartMailer.io">SmartMailer.io</a></h1>
          <p>I built a tool very similar to this one as an experiment to see how much money I could bring in to a previous workplace by sending automated emails based on various criteria. The answer turned out to be millions and millions of dollars.</p>
          <p>I have deliberately left several small sections of this code incomplete in order to prevent accidental misuse. This code is very simple but extremely powerful and it would be very easy to accidentally use it in a way which violates laws all over the world.</p>
          <p>You MUST research the legal requirements in your jurisdiction before using any part of this project, and make sure you have unambiguous and clear consent as required by law before sending any emails to anyone.</p>
          <p>I accept no responsibility for the misuse of this code, accidental or deliberate by anyone.</p>
        </div>
      </div>
  	</div>
  </div><!-- /.container -->
  
   <div class="container">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <?php SmartMailer(); ?>
        </div>
      </div>
  	</div>
  </div><!-- /.container -->

</body>
</html>
