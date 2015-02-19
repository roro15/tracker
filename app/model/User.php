<?php
namespace DB;

class User extends DomainObject {
	public function table() {
		return 'user';
	}
}