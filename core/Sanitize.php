<?php

function Sanitize($Input, $Type = 'string'){
  
  //TODO this function will be expanded to work for whatever type of databases we support
  
  $Type = strtolower($Type);
  
  switch($Type){
    case 'int':
    case 'integer':
      return intval($Input);
    case 'string':
    default:
      //TODO debug this here MakeSureDBConnected();
      return mysqli_real_escape_string($Database['Resource'],$Input);
  }
}
