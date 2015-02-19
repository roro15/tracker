<?php
namespace Tracker;

class DBWhere {
	const STATE_OPENED = 0;
	const STATE_CLOSED = 1;

	private $_state = self::STATE_OPENED;
	private $_sql = '';
	private $_values = array();
	private $_not = false;

	private function _op($statement, $value) {
		$this->_check($this->_state === self::STATE_OPENED);
		if($this->_not) {
			$statement = 'NOT ' . $statement;
			$this->_not = false;
		}
		$this->_sql .= ' ' . $statement;
		if(is_array($value)) {
			$this->_values = array_merge($this->_values, $value);
		} else {
			$this->_values[] = $value;
		}
		$this->_state = self::STATE_CLOSED;
		$this->_not = false;
		return $this;
	}

	private function _merge($merge) {
		$this->_check($this->_state ===  self::STATE_CLOSED);
		$this->_sql .= ' ' . $merge;
		$this->_state = self::STATE_OPENED;
		return $this;
	}

	private function _check($condition) {
		if(!$condition) {
			throw new \Exception();
		}
	}

	public function eq($field, $value) {
		return $this->_op($field . '=?', $value);
	}

	public function lt($field, $value) {
		return $this->_op($field . '<?', $value);
	}

	public function lte($field, $value) {
		return $this->_op($field . '<=?', $value);
	}

	public function gt($field, $value) {
		return $this->_op($field . '>?', $value);
	}

	public function gte($field, $value) {
		return $this->_op($field . '>=?', $value);
	}

	public function in($field, array $value) {
		$count = count($value);
		return $this->_op($field . ' IN (' . implode(',', array_fill(0, $count, '?')) . ')', $value);
	}

	public function not() {
		$this->_check($this->_state ===  self::STATE_OPENED && !$this->_not);
		$this->_not = true;
		return $this;
	}

	public function mergeAnd() {
		return $this->_merge('AND');
	}

	public function mergeOr() {
		return $this->_merge('OR');
	}

	public function sql() {		
		$sql = '';
		if(!empty($this->_sql)) {
			$this->_check($this->_state ===  self::STATE_CLOSED && !$this->_not);
			$sql = 'WHERE' . $this->_sql;
		}
		return array($sql, $this->_values);
	}

	public function clear() {
		$this->_sql = '';
		$this->_values = array();
		$this->_state = self::STATE_OPENED;
		$this->_not = false;
		return $this;
	}

}