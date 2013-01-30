<?php
require_once("../vendor/autoload.php");
require_once("../RomanCalendar.php");

class RomanCalendarTest extends PHPUnit_Framework_TestCase {

	public function testGetYearTime(){
		$date = '2012-12-20';
		$this->assertEquals(RomanCalendar::TIME_ADVENT, RomanCalendar::getYearTime($date),'failed advent test');

		$date = '2013-01-03';
		$this->assertEquals(RomanCalendar::TIME_CHRISTMAS, RomanCalendar::getYearTime($date),'failed christmas test');

		$date = '2012-12-25';
		$this->assertEquals(RomanCalendar::TIME_CHRISTMAS, RomanCalendar::getYearTime($date),'failed christmas day test');

		$date = '2013-01-13';
		$this->assertEquals(RomanCalendar::TIME_CHRISTMAS, RomanCalendar::getYearTime($date),'failed last day of christmas test');

		$date = '2013-03-1';
		$this->assertEquals(RomanCalendar::TIME_LENT, RomanCalendar::getYearTime($date),'failed lent test');

		$date = '2013-03-31';
		$this->assertEquals(RomanCalendar::TIME_EASTER, RomanCalendar::getYearTime($date),'failed easter day test');

		$date = '2013-04-1';
		$this->assertEquals(RomanCalendar::TIME_EASTER, RomanCalendar::getYearTime($date),'failed easter test');

		$date = '2013-07-19';
		$this->assertEquals(RomanCalendar::TIME_ORDINARY, RomanCalendar::getYearTime($date),'failed ordinary test');

		$date = '2013-01-14';
		$this->assertEquals(RomanCalendar::TIME_ORDINARY, RomanCalendar::getYearTime($date),'failed first ordinary after christmas  test');

		$date = '2013-02-13';
		$this->assertEquals(RomanCalendar::TIME_LENT, RomanCalendar::getYearTime($date),'failed ashes day test');
	}

	public function testGetAshWednesday(){
		$this->assertEquals(3, RomanCalendar::getAshWednesday()->format('w'),'is not a wednesday');

		$date = new DateTime('2013-02-13',new DateTimeZone('UTC'));
		$wed = RomanCalendar::getAshWednesday(2013);


		$interval = $date->diff($wed);
		$this->assertEquals(0, $interval->days,'wrong day');

	}
}