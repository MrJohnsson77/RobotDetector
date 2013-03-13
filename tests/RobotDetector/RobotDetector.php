<?php 
$base = realpath(dirname(__FILE__) . '/../..');
require "$base/src/RobotDetector/RobotDetector.php";

class testRobotDetector extends PHPUnit_Framework_TestCase {


	public function setUp() {
		$this->test = new RobotDetector\RobotDetector;
	}

	public function testRobotDetect()
	{	
        $result = $this->test->RobotDetect();
		$this->assertTrue(is_integer($result), 'Error getting integer');
	}

}