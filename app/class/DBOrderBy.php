<?php
namespace Tracker;

class DBOrderBy {
	private $_fields = array();

	public function orderBy($field, $asc = true) {
		if($asc) {
			$field .= ' ASC';
		} else {
			$field .= ' DESC';
		}
		$this->_fields[] = $field;
		return $this;
	}

	public function clear() {
		$this->_fields = array();
		return $this;
	}

	public function sql() {
		$sql = '';
		if(!empty($this->_fields)) {
			$sql .= 'ORDER BY ' . implode(', ', $this->_fields);
		}
		return $sql;
	}
}