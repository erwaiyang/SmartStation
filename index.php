<?php
	if($_GET['test']=="test"){
		echo "test OK!";
		exit();
	}
	if(empty($_POST)){
		exit();
	}
	switch ($_POST['operation']) {
		case 'letter_in':
			do_mysql_work();
			http_response_code(200);
			break;
		
		default:
			# code...
			break;
	}
	function do_mysql_work(){

	}
?>