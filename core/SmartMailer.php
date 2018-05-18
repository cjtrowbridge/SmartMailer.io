<?php

function SmartMailer(){
  $Campaigns = Query("SELECT * FROM Campaigns");
  foreach($Campaigns as $Campaign){
    $Segmentation = Query($Campaign['Query']);
    foreach($Segmentation as $Variables){
      $ThisMessage = $Campaign['Message'];
      foreach($Variables as $Key => $Value){
        $ThisMessage = str_replace('['.strtoupper($Key).']',$Value,$ThisMessage);
      }
      QueueEmail($To,$ThisMessage,$Campaign['CampaignID']);
    }
    Query("UPDATE Campaigns SET LastRun = NOW() WHERE CampaignID = ".$Campaign['CampaignID']);
  }
}

function QueueEmail($To,$Message,$CampaignID){
  $Hash = md5($To.':'.PHP_EOL.$Message);
  if(!(AlreadyQueued($Hash))){
    QueueEmail($To,$Message,$CampaignID);
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
  
function QueueEmail($To,$Message,$CampaignID){
  Query("
    INSERT INTO `Messages`(
      `Destination`, `Message`, `CampaignID`, `Queued`
    )VALUES(
      '".Sanitize($To)."', '".Sanitize($Message)."', '".$CampaignID."', NOW()
    );
  ");
}
