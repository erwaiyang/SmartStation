<?php
	if(empty($_POST)){
		exit();
	}
	switch ($_POST['operation']) {
		case 'letter_in':
			do_mysql_work();
			http_response_code(200);
			break;
		case 'for_test':
			if($_POST['option']=="A"){
				$data['returning'] = "this is returning!";
				$data['type'] = "A";
			}else{
				$data['returning'] = "else else and else~";
				$data['type'] = "BCDFG";
			}
			echo json_encode($data);
			break;
		default:
			# code...
			break;
	}
	function do_mysql_work(){

	}
?>