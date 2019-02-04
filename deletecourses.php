<?php
	require "db_connect.php";
  $id = $_GET['id'];
  $query = mysqli_query($connect, "DELETE * FROM courses WHERE id = '{$id}'")

  if ($query){
    header("location: listcourses.php?rel=success");
  }
?>