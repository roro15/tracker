<?php
namespace Tracker;

class Test extends DBModel {
	public function table() {
		return 'test';
	}

	public function fields() {
		return array(
			'id',
			'test_string',
			'test_id',
		);
	}
}