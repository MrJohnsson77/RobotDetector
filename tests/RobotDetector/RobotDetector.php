<?php 
$base = realpath(dirname(__FILE__) . '/../..');
require "$base/src/RobotDetector/RobotDetector.php";

class testRobotDetector extends PHPUnit_Framework_TestCase {


	public function SetUp() {
		$this->test = new RobotDetector\RobotDetector;
	}

	public function testRobotDetect()
	{	
        $emptyRobot = $this->test->RobotDetect();
        $isRobot = $this->test->RobotDetect('Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)');
        $isNotRobot = $this->test->RobotDetect('Mozilla/5.0 (Windows; U; Windows NT 6.1; pl; rv:1.9.2.3) Gecko/20100401 Firefox/3.6.3');
        $CommonBrowser = $this->test->RobotDetect('Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US) AppleWebKit/533.2 (KHTML, like Gecko) Chrome/6.0');

		$this->assertTrue(($emptyRobot === 0), 'Error getting integer from Non Robot');
		$this->assertTrue(($isRobot === 1), 'Error getting integer from Is Robot');
		$this->assertTrue(($CommonBrowser === 0), 'Error getting integer from Common Browser');
	}

}