<?php

class Model_User extends Orm\Model {
	protected static $_properties = array(
		'id',
		'username' => array(
			'label' => 'ユーザー名',
			'null' => false,
			'validation' => array('required', 'max_length' => array(32)),
		),
		'password' => array(
			'label' => 'パスワード',
			'form' => array('type' => 'password'),
			'validation' => array('required', 'min_length' => array(8), 'match_field' => array('confirm')),
		),
		'login_hash' => array(
			'form' => array('type' => false),
		),
	);
}