<?php
	header('Content-type: text/plain; charset=utf-8');

	require('./function.php');
	if(empty($_POST)){
		exit();
	}
	switch ($_POST['operation']) {
		case 'letter_receiving':
			$working = new do_mysql();
			echo $working->insert_data($_POST['order'], $_POST['data']);
			break;
		case 'get_data':
			$getting = new do_mysql();
			echo $getting->get_data($_POST['tablename']);
			break;
		default:
			# code...
			break;
	}
?>