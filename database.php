<?php
class dbcon {
	protected $db;
	function __construct() {
		$this->db = new SQLite3('chatroom.db');
	}

	function query($sql) {
		return $this->db->query($sql);
	}

	function __destruct(){
		$this->db->close();
	}
}
?>
