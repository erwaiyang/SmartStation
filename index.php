<?php
	header('Content-type: text/plain; charset=utf-8');

	require('./function.php');
	if(empty($_REQUEST)){
		exit();
	}
	switch ($_REQUEST['operation']) {
		case 'letter_receiving':
			$working = new do_mysql();
			echo $working->insert_data($_REQUEST['order'], $_REQUEST['data']);
			break;
		case 'get_data':
			$getting = new do_mysql();
			echo $getting->get_data($_REQUEST['tablename'], $_REQUEST['is_only_one']);
			break;
		default:
			# code...
			break;
	}
?>