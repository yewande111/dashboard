<?php
	require "db_connect.php";
	if (isset($_GET['id'])) {
		# code...
		$id = $_GET['id'];
		$delete = mysqli_query($connect, "DELETE * FROM users WHERE id = '{$id}'");
		if ($delete) {
			# code...
			header("location: listusers.php?rel=success");
		}
	}
?>