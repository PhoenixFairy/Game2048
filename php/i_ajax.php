<?php
include 'Main.php';
$dirct = $_REQUEST['dirct'];
if (isset($_REQUEST['array'])) {
	$array = json_decode($_REQUEST['array']);
}
if ($dirct == 'display') {
	Main::display($array);
	exit();
}
if ($dirct == 'initial') {
	echo json_encode(Main::initial());
	exit();
} 
if ($dirct == 'move') {
	if (isset($_REQUEST['moveid']) && isset($_REQUEST['array'])) {
		$moveid = (int)$_REQUEST['moveid'];
		$array = json_decode($_REQUEST['array']);
		echo json_encode(Main::move($array, $moveid));
	} else {
		echo '["error"]';
	}
}
if($dirct == 'addr'){
	echo json_encode(Main::add_rand_nbr($array));
}
?>