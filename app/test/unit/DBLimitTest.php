<?php
require_once('PHPUnit/Framework/TestCase.php');
require_once('../../vendor/autoload.php');

class TestDBLimit extends PHPUnit_Framework_TestCase {
	public function setUp() {
		$this->_limit = new \Tracker\DBLimit;
	}

	public function testEmpty() {
		$this->assertEmpty($this->_limit->sql());
	}

	public function testCount() {
		$sql = $this->_limit->count(10)->sql();
		$this->assertEquals($sql, 'LIMIT 10');
	}

	public function testOnlyOffset() {
		$this->setExpectedException('Exception');
		$this->_limit->offset(10)->sql();
	}

	public function testClear() {
		$this->assertEmpty($this->_limit->count(10)->offset(20)->clear()->sql());
	}

	public function testCountOffset() {
		$test = 'LIMIT 10, 20';
		$count = 20;
		$offset = 10;
		$sql = $this->_limit->count($count)->offset($offset)->sql();
		$this->assertEquals($sql, $test);
	}

	public function testLimitCount() {
		$test = 'LIMIT 20';
		$count = 20;
		$sql = $this->_limit->limit($count)->sql();
		$this->assertEquals($sql, $test);
	}

	public function testLimitCountOffset() {
		$test = 'LIMIT 10, 20';
		$count = 20;
		$offset = 10;
		$sql = $this->_limit->limit($count, $offset)->sql();
		$this->assertEquals($sql, $test);
	}
}