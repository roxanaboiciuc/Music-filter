<?php

namespace Helpers;

class Database {
	
	const DB_HOST = 'localhost';
	const DB_PORT = '3306';
	const DB_NAME = 'music';
	const DB_TYPE = 'mysql';
	
	const DB_USER = 'root';
	const DB_PASS = '';
	
	const DB_OPTIONS = array (
			\PDO::ATTR_DEFAULT_FETCH_MODE=> \PDO::FETCH_ASSOC,
			\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
		);
	
	const HOST_STR = self::DB_TYPE.':dbname='.self::DB_NAME.';host:'.self::DB_HOST.';port='.self::DB_PORT;
	
	private static $db_conn;
	
	private function __construct() {}
	
	public static function db_connect() {
		
		if (is_null(self::$db_conn)) {
			
			try {
			
				self::$db_conn = new \PDO(self::HOST_STR, self::DB_USER, self::DB_PASS, self::DB_OPTIONS);
			
			} catch (\PDOException $e) {
				
				die('Database connection error!');
				
			}
		
		}
		
		return self::$db_conn;
	}
	
}