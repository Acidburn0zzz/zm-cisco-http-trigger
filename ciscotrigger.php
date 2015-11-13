<?php
$log="";
#Grab POST data and trim, then load the string into xml loader
$dataPOST = trim(file_get_contents('php://input'));
$xmlData = simplexml_load_string($dataPOST) or die("Error: Cannot create object");
#use the eventState option to make sure we record only when the state is active(1).  I've not seen any POSTs that haven't been 1, which makes me think it only sends when active, but just in case we'll make sure we're looking at active states
$state=$xmlData->EventNotificationAlert[0]->eventState;
if ($state==1){
	#Assign variables to parts of xml that we are using. Set Camera name to the Monitor ID from zoneminder to create the dynamic
	$device=$xmlData->EventNotificationAlert[0]->deviceName;
	$type=$xmlData->EventNotificationAlert[0]->eventType;
	#Create a dynamic eventType based on the XML.  1=IO Alarm port(and include which IO port), 2=Motion.  We will add this to the reason part of the zmtrigger feature
	$eventType="";
	if ($type==1){
		$portID=$xmlData->EventNotificaitonAlert[0]->inputIOPortID;
		$eventType="Alarm on IO ".$portID;
	}
	elseif ($type==2){
		$eventType="Motion Detected";
	}
	else {
		$eventType="Unknown Type";
	}
	#Send information to log
	$log=date("Y-m-d H:m:s",time()).": Device ID ".$device." (".$_SERVER["REMOTE_ADDR"].") reported ".$eventType."\n";
	file_put_contents("log.txt",$log,FILE_APPEND | LOCK_EX);
}
#If eventState does not equal 1, log that something tried to send information but didn't have an eventState of 1
else {
	
}
?>
