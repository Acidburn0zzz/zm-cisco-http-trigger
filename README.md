# zm-cisco-http-trigger
Zoneminder Cisco HTTP POST Trigger

Created by: Nathan Tremmel

To alleviate CPU usage on your zoneminder server, you can have cameras do the heavy lifting of determining motion.  The cameras can then send a trigger to zoneminder to start recording.

This script uses the HTTP POST and motion detection or alarm IO ports feature of the Cisco CIVS-IPC-2621V cameras to trigger an event in zoneminder.

HOW TO USE

1) Place ciscotrigger.php in the web directory of your computer 

2) on the cameras, set the Device Name to the monitor ID in zoneminder

3)in IE8 with the activex plugin, go to Applications, Motion Dection and set a Window for motion detection and threshold, etc

4)Go to Applications, Mail/FTP/HTTP, enable http and enter the ip and URL of the location of ciscotrigger.php

5)Go to Event and create an every day all the time schedule and click add.

6)set Trigger Event to Enable and select what triggers you want enabled and put a check in the HTTP box and click save.

This script is provided as-is and has no warranty.