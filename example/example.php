<?php 
require_once "../src/RobotDetector/RobotDetector.php";


$detect = new RobotDetector\RobotDetector;
$check = $detect->RobotDetect('Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)');

$robot = ($check == "0") ? "Not a robot": "This is a robot";

echo "$robot";
 ?>