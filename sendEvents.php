<?php
	require '../../../notouch/databaseAccess.php';
	//$datetimeStr = $_GET['datetimeStr'];
	//system.out.println("hiiii");
	$username = $_GET['username'];
	$eventname = $_GET['eventname'];
	$datetime = $_GET['datetime'];
	//echo '"'.$username.'"';
/*	$dstmt = $mysqli->prepare("delete from events WHERE username = ?");
	$dstmt->bind_param('s', $username);
	$dstmt->execute();
	$dstmt->close();*/
//	if (!empty($datetime) && !empty($eventname)){
		$stmt = $mysqli->prepare("insert into events values (?,?,?)");
		$stmt->bind_param('sss', $username, $eventname, $datetime);
		$stmt->execute();
		/*$stmt->bind_result($id, $usrnm, $eventname, $datetime);
		while($stmt->fetch()){
			echo $datetime . '|' . $eventname . '|';
		}*/
		$stmt.close();
//	}

?>
