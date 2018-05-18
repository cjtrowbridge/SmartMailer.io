<?php

function SmartMailer(){
  $Campaigns = Query("SELECT * FROM Campaigns");
  
  echo '<h1><br>Campaigns</h1>';
  echo ArrTabler($Campaigns);
    
  foreach($Campaigns as $Campaign){
    $Segmentation = Query($Campaign['Query']);
    
    echo '<h4>Segmentation</h4>';
    echo ArrTabler($Segmentation);
    
    foreach($Segmentation as $Variables){
      $ThisMessage = $Campaign['Message'];
      foreach($Variables as $Key => $Value){
        $ThisMessage = str_replace('['.strtoupper($Key).']',$Value,$ThisMessage);
      }
      MaybeQueueEmail($Variables['Email'],$ThisMessage,$Campaign['CampaignID']);
    }
    Query("UPDATE Campaigns SET LastRun = NOW() WHERE CampaignID = ".$Campaign['CampaignID']);
  }
  
  echo '<h1>Queue</h1>';
  echo ArrTabler(Queue());
  
}

function MaybeQueueEmail($To,$Message,$CampaignID){
  $Hash = md5($To.':'.PHP_EOL.$Message);
  if(!(AlreadyQueued($Hash))){ //This prevents sending duplicates
    QueueEmail($To,$Message,$CampaignID,$Hash);
  }
}

function AlreadyQueued($Hash){
  $Result = Query("SELECT COUNT(*) as 'Count' FROM Messages WHERE Hash LIKE '".$Hash."'");
  if($Result[0]['Count']==0){
    return false;
  }else{
    return true;
  }
}
  
function QueueEmail($To,$Message,$CampaignID,$Hash){
  Query("
    INSERT INTO `Messages`(
      `Destination`, `Message`, `CampaignID`, `Queued`, `Hash`
    )VALUES(
      '".Sanitize($To)."', '".Sanitize($Message)."', '".$CampaignID."', NOW(), '".$Hash."'
    );
  ");
}
function Queue(){
  return Query("SELECT * FROM Messages");
}

function ActuallySend(){
  $Queue = Query("SELECT * FROM Messages WHERE Sent IS NULL");
  foreach($Queue as $Message){
    Query("UPDATE Messages SET Sent = NOW() WHERE MessageID = ".$Message['MessageID']);
    SendEmail($Message['Message'], $Message['Subject'], $Message['Destination'], $Message['From']);
  }
  echo '<h4>All Queued Messages Have Been Sent!</h4>';
}
