<?php
namespace DB;

class DomainObject {
	private static $_db;

	abstract public function table();

	public function db() {
		return self::$_db;
	}

	public function className() {
		return get_class($this);
	}

	public function q($value) {
		$q = $this->db()->quote();
		return;
	}

	public function findById($id) {
		$db = $this->db();
		$sql = 'SELECT * FROM ' . $this->table() . ' WHERE id = ?';
		$st = $db->prepare($sql);
		$st->execute(array($id));
		if(($raw = $st->fetch(PDO::FETCH_ASSOC)) !== false) {
			return $this->doCreate($raw);
		}
		return false;
	}

	public function save() {

	}

	protected function doCreate($raw) {
		$object = new $this->className();
		foreach($raw as $key => $value) {
			$object->$key = $value;
		}
		return $object;
	}
}