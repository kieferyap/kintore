<?php

class Model_Exercise extends Orm\Model {
	protected static $_properties = array(
		'id',
		'name',
		'unit',
		'user_id'
	);
}