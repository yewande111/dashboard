<?php
	require "db_connect.php";
	$id = $_GET['id'];
	$query = mysqli_query($connect, "DELETE FROM content where id ='{$id}'");

	if ($query) {
		# code...
		header("location: listcontent.php?rel=success");

	}
?>