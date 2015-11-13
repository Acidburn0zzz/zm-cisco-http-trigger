<?php
$xml=simplexml_load_file("test.xml") or die("Error: Cannot create object");
$device=$xml->EventNotificationAlert[0]->deviceName;
echo $device."|on|1|Motion|Motion";
?>
