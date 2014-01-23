<?php
	require '../../../notouch/databaseAccess.php';
	$username = $_GET['username'];
	$datemin = $_GET['datemin'];
	$datemax = $_GET['datemax'];
	$dstmt = $mysqli->prepare("delete from events WHERE username = ? and datetime > ? and datetime < ?");
	$dstmt->bind_param('sss', $username, $datemin, $datemax);
	$dstmt->execute();
	$dstmt->close();
?>
