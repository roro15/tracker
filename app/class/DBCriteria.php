<?php
namespace Tracker;

class DBCriteria {
	private $_where;
	private $_orderBy;
	private $_limit;

	public function __construct() {
		$this->_where = new DBWhere();
		$this->_orderBy = new DBOrderBy;
		$this->_limit = new DBLimit();
	}

	public function where() {
		return $this->_where;
	}

	public function orderBy() {
		return $this->_orderBy;
	}

	public function limit() {
		return $this->_limit;
	}

	public function clear() {
		$this->_where->clear();
		$this->_orderBy->clear();
		$this->_limit->clear();
	}

	public function sql() {
		list($sql, $params) = $this->_where->sql();
		$order = $this->_orderBy->sql();
		$limit = $this->_limit->sql();
		if(!empty($order)) {
			if(!empty($sql)) {
				$sql .= ' ';
			}
			$sql .= $order;
		}
		if(!empty($limit)) {
			if(!empty($sql)) {
				$sql .= ' ';
			}
			$sql .= $limit;
		}
		return array($sql, $params);
	}
}
