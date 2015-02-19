<?php
require_once('PHPUnit/Framework/TestCase.php');
require_once('../../vendor/autoload.php');

class TestDBOrder extends PHPUnit_Framework_TestCase {
	public function setUp() {
		$this->_order = new \Tracker\DBOrderBy;
	}

	public function testEmpty() {
		$this->assertEmpty($this->_order->sql());
	}

	public function testSingleAsc() {
		$this->assertEquals($this->_order->orderBy('test')->sql(), 'ORDER BY test ASC');
	}

	public function testSingleDesc() {
		$this->assertEquals($this->_order->orderBy('test', false)->sql(), 'ORDER BY test DESC');
	}

	public function testDouble() {
		$this->assertEquals($this->_order->orderBy('test', false)->orderBy('test2', true)->sql(), 
			'ORDER BY test DESC, test2 ASC');
	}
}