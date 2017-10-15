<?php

class DB {
	private static $db;

	public function __construct() {

		$dbUrl = getenv('DATABASE_URL');

		if (empty($dbUrl)) {
			$this->db = $db = pg_connect("host=localhost dbname=postgres user=postgres password=123");
			return;
		}

		$dbHost = $dbopts["host"];
		$dbUser = $dbopts["user"];
		$dbPassword = $dbopts["pass"];
		$dbName = ltrim($dbopts["path"],'/');

		$this->db = pg_connect("
			host=".$dbHost." 
			dbname=".$dbName." 
			user=".$dbUser." 
			password=".$dbPassword);
	}

	public function query($query_str) {
		return pg_query($this->db, $query_str);
	}
}