<?php
/**
 * Fuel is a fast, lightweight, community driven PHP 5.4+ framework.
 *
 * @package    Fuel
 * @version    1.8.2
 * @author     Fuel Development Team
 * @license    MIT License
 * @copyright  2010 - 2019 Fuel Development Team
 * @link       https://fuelphp.com
 */

/**
 * -----------------------------------------------------------------------------
 *  Global database settings
 * -----------------------------------------------------------------------------
 *
 *  Set database configurations here to override environment specific
 *  configurations
 *
 */

return array(
	'default' => array(
		'connection' => array(
			'dsn'      => getenv('DB_DSN'),
			'username' => getenv('DB_USERNAME'),
			'password' => getenv('DB_PASSWORD'),
			// 'dsn'      => 'mysql:host=localhost;dbname=kintore',
			// 'username' => 'root',
			// 'password' => '',
		),
	),
);
mysql://feilq4f9w8x8ymk0:lk2335939nt43sgn@xlf3ljx3beaucz9x.cbetxkdyhwsb.us-east-1.rds.amazonaws.com:3306/oqfc8l6m7ajmxe5m
