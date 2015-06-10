<?php
require_once "../src/RobotDetector/RobotDetector.php";

$detect = new RobotDetector\RobotDetector;
$user_agent = $_SERVER['HTTP_USER_AGENT'];

$check = $detect->RobotDetect($user_agent);

$robot = ($check === 0) ? "Not a robot" : "This is a robot";

echo "$robot";
