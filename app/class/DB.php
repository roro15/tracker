<?php

namespace Tracker;

class DB {
	private $_pdo;
	private $_dsn;
	private $_username;
	private $_password;
	private $_options;

	public public __construct($dsn, $username, $password, array $options = array()) {
		$this->_dsn = $dsn;
		$this->_username = $username;
		$this->_password = $password;
		$this->_options = $options;
	}

	public function getPdo() {
		if(is_null($this->_pdo)) {
			$this->_pdo = new PDO($dsn, $username, $passowrd, $options);
		}
		return $this->_pdo;
	}
 
}