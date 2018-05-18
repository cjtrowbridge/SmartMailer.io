<?php

function MakeSureDBConnected(){
  global $Database;
  
  if(!(isset($Database['Resource']))){$Database['Resource']=false;}
  if($Database['Resource']==false){
    
    //TODO more types will be supported by a future version
    $Database['Type']='mysql';
    
    switch($Database['Type']){
      case 'mysql':
        $Database['Resource'] = mysqli_connect(
        $Database['Host'],
        $Database['Username'],
        $Database['Password'],
        $Database['Database']
        ) or die(mysql_error());
        $Database['Resource']->set_charset('utf8mb4');
       break;
    default:
      die('Unsupported database type: "'.$Database['Type'].'" for database.');
    }
  }
}


//TODO abstract string escaping into a separate function which is aware of the database type and best way of doing that for each database.
function Query(
	$SQL
){
	
	//Check that database exists and is available, and connect to it.
	MakeSureDBConnected();
	//TODO include_once('Cache.php');
	
	global $Database;
	switch($Database['Type']){
		case 'mysql':
      $result=mysqli_query($Database['Resource'], $SQL) or die(mysqli_error($Database['Resource']));
      if(is_bool($result)){
        return $result;
      }
      $Output=array();
      while($Row=mysqli_fetch_assoc($result)){
        $Output[]=$Row;
      }
			return $Output;
			break;
		default:
			die('Unsupported database type.');
	}
	
}
function Query_LastInsertID(){
	MakeSureDBConnected();
	global $Database;
	switch($Database['Type']){
		case 'mysql':
			return mysqli_insert_id($Database['Resource']);
		default:
			die('Unsupported database type.');
	}
}
