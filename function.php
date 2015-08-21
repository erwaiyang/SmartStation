<?php
class do_mysql{
	//this line is the config of database
	private $host = "localhost", $user = "root", $pass = "ntu_dev", $dbname = "post_mgr";
	//database connection resource
	private $db;
	//the constructor
	function __construct(){
		$this->db = new mysqli($this->host, $this->user, $this->pass, $this->dbname);
		if($this->db->connect_errno > 0){
			die('Unable to connect to database. ' . $this->db->connect_error );
		}
		$this->db->set_charset("utf8");
	}
	//the destructor
	function __destruct(){
		$this->db->close();
	}

	function get_data(){
		$query = "SELECT * FROM `test`;";
		$result = $this->db->query($query);
		//return data
		$data = "";
		while($row = $result->fetch_array(MYSQLI_ASSOC)){
			$data .= $row["id"] . " " . $row["test"] . "<br />";
		}
		$result->close();
		return $data;
	}

	function insert_data($scope){
		$insert = "";
	}
}
$a = new do_mysql();
$return = $a->get_data();
echo $return;
?>