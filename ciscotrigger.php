<?php
$dataPOST = trim(file_get_contents('php://input'));
$xmlData = simplexml_load_string($dataPOST) or die("Error: Cannot create object");
$device=$xmlData->EventNotificationAlert[0]->deviceName;
file_put_contents("log.txt",$device."|on|1|Motion|Motion");
?>
