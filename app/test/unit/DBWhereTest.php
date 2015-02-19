<?php
require_once('PHPUnit/Framework/TestCase.php');
require_once('../../vendor/autoload.php');

class TestDBWhere extends PHPUnit_Framework_TestCase {
	public function setUp() {
		$this->_where = new \Tracker\DBWhere;
	}

	public function testEmpty() {
		list($sql, $values) = $this->_where->sql();
		$this->assertEmpty($sql);
	}

	public function testLt() {
		$this->_where->lt('test', 10);
		list($sql, $values) = $this->_where->sql();
		$this->assertEquals($sql, 'WHERE test<?');
		$this->assertEquals($values, array(10));
	}

	public function testDoubleLt() {
		$this->setExpectedException('Exception');
		$this->_where->lt('test', 10)->lt('test', 10);
	}

	public function testAnd() {
		$this->_where->lt('test', 10)->mergeAnd()->lt('test', 10);
		list($sql, $values) = $this->_where->sql();
		$this->assertEquals($sql, 'WHERE test<? AND test<?');
		$this->assertEquals($values, array(10, 10));
	}

	public function testDoubleAnd() {
		$this->setExpectedException('Exception');
		$this->_where->lt('test', 10)->mergeAnd()->mergeAnd();
	}

	public function testFirstAnd() {
		$this->setExpectedException('Exception');
		$this->_where->mergeAnd();
	}

	public function testLastEnd() {
		$this->setExpectedException('Exception');
		$this->_where->lt('test', 10)->mergeAnd()->sql();
		$this->_where->sql();
	}

	public function testIn() {
		list($sql, $values) = $this->_where->in('test', array(1, 2, 3))->sql();
		$this->assertEquals($sql, 'WHERE test IN (?,?,?)');
		$this->assertEquals($values, array(1, 2, 3));
	}

	public function testClear() {		
		list($sql, $values) = $this->_where->lt('test', 10)->clear()->sql();
		$this->assertEmpty($sql);
		$this->assertEmpty($values);
		list($sql, $values) = $this->_where->lt('test', 10)->sql();
		$this->assertEquals($sql, 'WHERE test<?');
		$this->assertEquals($values, array(10));
	}
}