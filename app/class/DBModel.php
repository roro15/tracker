<?php
namespace Tracker;

abstract class DBModel {
	private $_fields = array();
	private $_db = null;
	private static $_globalDb = null;
	private static $_instances = array();

	abstract public function table();
	abstract public function fields();

	public static function setGlobalDb($db) {
		self::$_globalDb = $db;
	}

	public static function getGlobalDb($db) {
		return self::$_globalDb;
	}

	public static function init($db) {
		self::setGlobalDb($db);
	}

	public static function create($class, array $raw = null) {
		$db = self::getGlobalDb();
		$object = new $class($db);
		if(!is_null($raw)) {
			$object->setRaw($raw);
		}
		return $object;
	}

	public static function instance($class) {
		if(empty(self::$_instances[$class])) {
			self::$_instances[$class] = new $class(self::getGlobalDb()) {}
		}
		return self::$_instances[$class];
	}

	protected function __construct($db) {
		$this->setDb($db);
	}

	public function pk() {
		return 'id';
	}

	public function isField($name) {
		return in_array($name, $this->fields());
	}

	public function __get($name) {
		$getter = 'get' . ucfirst($name);
		if(method_exists($this, $getter)) {
			return call_user_func(array($this, $getter));
		} 
		if($this->isField($name))) {
			if(!isset($this->_fields[$name])) {
				$this->_fields[$name] = null;
			}
			return $this->_fields[$name];
		}
		throw new DBException();
	}

	public function __set($name, $value) {
		$setter = 'set' . ucfirst($name);
		if(method_exists($this, $setter)) {
			return call_user_func(array($this, $setter));
		}
		if($this->isField($name)) {
			$this->_fields[$name] = $value;
			return;
		}
		throw new DBException();
	}

	public function setRaw(array $raw) {
		foreach($raw as $key => $value) {
			$this->$key = $value;
		}
	}

	public function setDb($db) {
		$this->_db = $db;
	}

	public function getDb() {
		return $this->_db;
	}

	public function findAllBySql($sql, array $params = array()) {
		$sql = 'SELECT ' . implode(',' $this->fields()) . ' FROM ' . $this->table();
		$db = $this->getDb();
		$stmt = $db->prepare($sql);
		$stmt->execute($params);
		$collection = array();
		$class = get_class($this);
		while(($raw = $stmt->fetch(\PDO::FETCH_ASSOC)) !== false) {
			$object = new $class($db);
			$object->setRaw($raw);
			$collection[] = $object;
		}
		return $collection;
	}

	public function findAllByCriteria(DBCriteria $criteria) {
		list($sql, $params) = $criteria->getSql();
		return $this->findALlBySql($sql, $params);
	}

	public function findByPk($pk) {
		$criteria = new DBCriteria;
		$criteria->where()->($this->pk(), $pk);
		$criteria->limit(1);
		$collection = $this->findAllByCriteria($criteria);
		return empty($collection) ? null : $collection[0];
	}



}