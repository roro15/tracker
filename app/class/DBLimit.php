<?php
namespace Tracker;

class DBLimit {
	private $_offset = 0;
	private $_count = 0;

	public function limit($count, $offset = 0) {
		return $this->count($count)->offset($offset);
	}

	public function count($count) {
		$count = intval($count);
		$this->_count = $count;
		return $this;
	}

	public function offset($offset) {
		$offset = intval($offset);
		$this->_offset = $offset;
		return $this;
	}

	public function clear() {
		$this->_count = 0;
		$this->_offset = 0;
		return $this;
	}

	public function sql() {
		$sql = '';
		if($this->_count > 0) {
			$sql .= 'LIMIT ';
			if($this->_offset > 0) {
				$sql .= $this->_offset . ', ';
			}
			$sql .= $this->_count;
		} else if($this->_offset > 0) {
			throw new \Exception;
		}
		return $sql;
	}
}