<?php

      if(isset($_GET['rel'])) {
?>
 <script>alert('Content Added/Deleted Successfully');
 window.location = 'listcontent.php';
</script>
<?php

      }

?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>dashboard</title>
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

     <div class="cards">
            <a href="#" class="active"><i class="fa fa-user eye" aria-hidden="true"></i>ADMIN</a>
            <span> 1</span>
     </div>
     <div class="cards">
            <a href="#" class="active"><i class="fa fa-eye eye" aria-hidden="true"></i>VISITING</a>
            <span> 500 </span>
    </div>
    <div class="cards">
        <a href="#" class="active"><i class="fa fa-comments eye" aria-hidden="true"></i>TESTIMONIES</a>
       <span> 50</span>
    </div>
       <div class="cards">
        <a href="#" class="active"><i class="fa fa-sticky-note-o eye" aria-hidden="true"></i>COURSES</a>
    <span> 100</span>
       </div>
<!-- </div>
     <div class="cards">
       <h6>STARTING CODING</h6>
    </div>
    <div class="cards">
         <h6>CONTACT</h6>
    </div> -->
             <!-- <div class="dash">
                    <img src="/images/3.jpeg" alt=" " class="img-fluid">
                    <h6>Stats</h6>
                 </div> -->
           
           <?php
            require "db_connect.php";
            // echo "Welcome back, ".$_SESSION['user']['username'];
           // $user_id = $_SESSION['user']['id'];
           $query = mysqli_query($connect, "SELECT * FROM content") or die(mysqli_error());
            if (mysqli_num_rows($query) > 0 ) {
                echo "<table class='table'>
                <tr><th>S/N</th><th>Content</th><th>Instructor</th> <th> Course ID </th><th> Action </th>
                </tr>";
                $i = 0;
                while($fetch = mysqli_fetch_array($query)) {
                    $id = $fetch['id'];
                    echo "<tr><td>".($i+1)."</td><td>".$fetch['content']. "</td><td>".$fetch['instructor']. "</td><td>".$fetch['course_id']."</td><td><a href='deletecontent.php?id=".$id."'> Delete Content </a></td></tr>";
                    $i++;
                }
                echo "</table>";
            } 
            else {
                echo "<br> <br>";
                echo "<div class='alert alert-danger'>No Course Added</div>";
            }
        ?>

    </section>
    
   </body>
   </html>