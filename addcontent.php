<?php
	require "db_connect.php";	
?>
<!DOCTYPE html>
<html>
	<head>
		<title> New Blog Post </title>
		<link rel="stylesheet" href="../../contact/intro/bootstrap/dist/css/bootstrap.min.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta charset="utf-8">
		<link rel="stylesheet" href="css/bootstrap.css" type="text/css" media="all">
		<!-- <link rel="stylesheet" href="css/font-awesome.css" /> -->
		<link rel="stylesheet" href="css/dashboard.css" type="text/css" media="all">
		<link rel="stylesheet" href="css/content.css" type="text/css" media="all">
		<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
		<link href="//fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;subset=cyrillic,cyrillic-ext,latin-ext,vietnamese" rel="stylesheet">
	</head>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<body>
		<section id="sidemenu">
        <nav>
            <a href="dashboard.php" class="active"><i class="fa fa-dashboard" aria-hidden="true"></i>Dashboard</a>
           
           
            <a href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Courses</a>
            <div class="dropdown-container">
                <div class="dropdown-container">
                <a href="addcourse.php">Add Courses</a>
                <a href="listcourses.html">Remove courses</a>
            </div>
            <a href="#"><i class="fa fa-sticky-note-o" aria-hidden="true"></i>Content</a>
            <div class="dropdown-container">
                <a href="listcourses.php">Add Content</a>
                <a href="listcontent.php">Remove Content</a>
                </div>
            <a href="#"><i class="fa fa-edit" aria-hidden="true"></i>User</a>
            <div class="dropdown-container">
                <a href="listusers.php">List Users</a>
                <a href="listusers.php">Delete Users</a>
            </div>
        </nav>

    </section>
    <section id="content-area">
        <div class="heading">
            <h1>Dashboard</h1>
            <p>welcome to ABBEYCODE</p>
        </div>
       <div style="margin-left: 20px;">
			<!-- <a href="home.php"> SEE all posts </a> -->
		</div>
		<div>
		 	<div class="row">
		 		<div class="col-md-7" style="margin-left: 100px; margin-top: 30px">
				 	<form method="post">
				 		<label> Content </label>
				 		<textarea required class="form-control" name="content" cols="50" rows="15"></textarea> <br>
				 		<label> Instructor  </label>
				 		<textarea required  maxlength="20" placeholder="Not more than 20 words" class="form-control" name="instructor"></textarea> <br>

				 		<input type="submit" name="post" value="POST" class="btn btn-info btn-lg">
				 			
				 			<?php
				 			if (isset($_POST['post'])) {
							# code...
							$content = $_POST['content'];
							$instructor = $_POST['instructor'];
							$course_id = $_GET['id'];

							$query_check = mysqli_query($connect, "SELECT * FROM content WHERE content = '{$content}'") or die(mysqli_error());

							if (mysqli_num_rows($query_check) > 0) {
								# code...
								echo "ALready Exists";
							}

							else {$query = mysqli_query($connect, "INSERT INTO content (content, instructor, course_id) VALUES ('{$content}', '{$instructor}', '{$course_id}')");
							if ($query) {
								# code...
								header("location: listcontent.php?rel=success");
							}
						}
					}

							// $query = mysqli_query($connect, "SELECT * from posts WHERE id= '{$id}'");
							// if (mysqli_num_rows($query)) {
								# code...
							// $fetch = mysqli_fetch_array($query);
				
								// $sql = mysqli_query($connect, "UPDATE posts SET post_title = '{$post_title}', excerpt = '{$excerpt}' WHERE id = '{$id}'") or die(mysqli_error($sql));
								// header("location: home.php?rel=success");

								// }
						?>
				 	</form>
				 </div>
			</div>
		</div>
    </section>
	</body>
</html>