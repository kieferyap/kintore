<?php

class Model_Entry extends Orm\Model {
	protected static $_properties = array(
		'id',
		'exercise_id',
		'date',
		'weight',
		'frequency',
		'total'
	);
}