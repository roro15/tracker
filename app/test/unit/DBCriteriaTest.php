<?php
require_once('PHPUnit/Framework/TestCase.php');
require_once('../../vendor/autoload.php');

class TestDBCriteria extends PHPUnit_Framework_TestCase {
	public function setUp() {
		$this->_criteria = new \Tracker\DBCriteria;
	}

	public function testEmpty() {
		list($sql, $values) = $this->_criteria->sql();
		$this->assertEmpty($sql);
	}

	public function testAll() {
		$c = $this->_criteria;
		$c->where()->eq('test', 10)->mergeAnd()->lt('test2', 20);
		$c->orderBy()->orderBy('test')->orderBy('test2', false);
		$c->limit()->limit(10, 20);
		list($sql, $params) = $c->sql();
		$this->assertEquals($sql, 'WHERE test=? AND test2<? ORDER BY test ASC, test2 DESC LIMIT 20, 10');
		$this->assertEquals($params, array(10, 20));
	}
}