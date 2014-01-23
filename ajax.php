<?php
	require '../../../notouch/databaseAccess.php';
	$datemin = $_GET['datemin'];
	$datemax = $_GET['datemax'];
//	$datetime = $_GET['datetime'];
	//system.out.println("hiiii");
	$username = $_GET['username'];
	//$selectedDate = $_POST['selectedDate'];
	//$selectedDate1 = $selectedDate+" 00:00:00";
	//$selectedDate2 = $selectedDate+" 23:59:59";
	$stmt = $mysqli->prepare("select * from events where username = ? and datetime > ? and datetime < ?");
	$stmt->bind_param('sss', $username, $datemin, $datemax);
	$stmt->execute();
	$stmt->bind_result($usrnm, $eventname, $datetime);
	while($stmt->fetch()){
		echo substr($datetime, 11, 5) . '|' . $eventname . '|';
	}
	//echo $eventname;

?>
