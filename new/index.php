<?php
	header('Content-type: text/plain; charset=utf-8');

	require('./function.php');
	if(empty($_REQUEST)){
		exit();
	}
	switch ($_REQUEST['operation']) {
		case 'insert_data':
			$working = new do_mysql();
			echo $working->insert_data($_REQUEST['tablename'], $_REQUEST['order'], $_REQUEST['data']);
			break;
		case 'get_only_one_row':
			$getting = new do_mysql();
			echo $getting->get_data($_REQUEST['tablename'], $_REQUEST['is_only_one']);
			break;
		case 'get_table_rows':
			$getting = new do_mysql();
			echo $getting->get_table_rows($_REQUEST['tablename'], $_REQUEST['limit_start'], $_REQUEST['limit_row']);
			break;
		default:
			# code...
			break;
	}
?>