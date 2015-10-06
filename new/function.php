<?php
class do_mysql{
	//this line is the config of database
	private $host = "localhost", $user = "root", $pass = "ntu_dev", $dbname = "new_post_db";
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

	function get_data($tablename, $is_only_one){
		if($is_only_one){ //true
			$query = "SELECT * FROM `"  . $tablename .  "` ORDER BY `" . $tablename . "`.`id` DESC LIMIT 0,1;";
		}else{
			$query = "SELECT * FROM `"  . $tablename .  "`;";
		}
		
		$result = $this->db->query($query);
		
		//return data
		if($is_only_one){
			$data = $result->fetch_assoc();
		}else{
			$data = array();
			while($row = $result->fetch_assoc()){
				array_push($data, $row);
			}
		}
		$result->close();
		return json_encode($data);
	}

	function get_table_rows($tablename, $limit_start, $limit_row){
		$query = "SELECT * FROM `"  . $tablename .  "` ORDER BY `ID` DESC LIMIT " . $limit_start . "," . $limit_row . " ;";
		
		$result = $this->db->query($query);
		
		//return data
			$data = array();
			while($row = $result->fetch_assoc()){
				array_push($data, $row);
			}
		
		$result->close();
		return json_encode($data);

	}

	function insert_data($tablename, $order, $data){
		//$order and $data are all CSV format, the delimiter is comma
		$insert = "INSERT INTO `" . $this->dbname . "`.`".$tablename."` ("  . $order .  ") VALUES (" . $data . ");";
		if ($this->db->query($insert)){
			return 0; //succeed
		}else{
			echo $this->db->error;
			echo "<br/>";
			echo "query=" . $insert;
			return 1; //error
		}


	}	
}
//testing
//$a = new do_mysql();
// $order = "zip_code,postbox_id,postbox_longitude,postbox_latitude,send_date,send_time,left_box_mail_num,left_box_mail_weight,right_box_mail_num,right_box_mail_weight";
// $data = "235,1,12345,67890,20150822,0923,2,20,3,30";
// $a->insert_data($order, $data);

?>