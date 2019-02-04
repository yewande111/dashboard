<?php
	require "db_connect.php";	
?>
<!DOCTYPE html>
<html>
	<head>
		<title> New Blog Post </title>
		<link rel="stylesheet" href="../contact/intro/bootstrap/dist/css/bootstrap.min.css">
	</head>
	<body>
		<div style="margin-left: 20px;">
			<a href="home.php"> SEE all posts </a>
		</div>
		<div>
		 	<div class="row">
		 		<div class="col-md-7" style="margin-left: 100px; margin-top: 30px">
				 	<form method="post">
				 		<?php
							$id = $_GET['id'];
							$query = mysqli_query($connect, "SELECT * from content WHERE id= '{$id}'");
							// if (mysqli_num_rows($query)) {
								# code...
							$fetch = mysqli_fetch_array($query);
						
						?>

				 		<label> Content </label>
				 		<textarea required class="form-control" name="content" cols="50" rows="15"> <?php echo $fetch['content'] ?> </textarea> <br>
				 		<label> Instructor  </label>
				 		<textarea required  maxlength="20" placeholder="Not more than 20 words" class="form-control" name="instructor"> <?php echo $fetch['instructor'] ?> </textarea> <br>

				 		<input type="submit" name="update" value="UPDATE" class="btn btn-info btn-lg">
				 			<?php
							if (isset($_POST['update'])) {
								$content = $_POST['content'];
								$instructor = $_POST['instructor'];							
								$sql = mysqli_query($connect, "UPDATE content SET content = '{$content}', instructor = '{$instructor}' WHERE id = '{$id}'") or die(mysqli_error($sql));
								if ($sql) {
									# code...
								
									# code...
									header("location: listcourses.php?rel=success");

								}
							}
						?>
				 	</form>
				 </div>
			</div>
		</div>
	</body>
</html>