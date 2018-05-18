<?php

function SendEmail($message, $subject = null, $to, $from = null){
  
  if($subject==null){$subject = 'SmartMailer';}
  if($from==null){$from = 'admin@SmartmMiler.io';}
  
  $mail = new PHPMailer;
  $mail->isSMTP();
  $mail->SMTPSecure = 'tls';
  $mail->SMTPAuth = false;
  $mail->SMTPOptions = array('ssl' => array('verify_peer' => false,'verify_peer_name' => false,'allow_self_signed' => true));
  $mail->SMTPDebug = 3; //Change this depending on the level of debugging you want
  $mail->Debugoutput = 'html';
  $mail->Host = 'your smtp host';
  $mail->Port = 'your smtp port';
  $mail->Username = 'your smtp username';
  $mail->Password = 'your smtp password';
  $mail->setFrom($from);
  $mail->addReplyTo($from);
  $to=explode(",",$to);
  foreach($to as $sendto){
    if(!(trim($sendto)=='')){
      $mail->addAddress($sendto);
    }
	}
  $mail->addAddress($from);
  $mail->Subject = $subject;
  $mail->msgHTML($message, dirname(__FILE__));
  if(!$mail->send()){
    if(!($silent)){
     echo "Mailer Error: " . $mail->ErrorInfo;
    }
  }else{
    //echo "Message sent!";
  }
  
}
