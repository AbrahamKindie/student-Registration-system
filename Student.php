<?php
  include('DBConnection.php');
  if(isset($_POST['Student'])){
	  $sql="SELECT COUNT(*) AS total_students FROM student";
	  $result=mysqli_query($conn,$sql);
	  $row=mysqli_fetch_assoc($result);
	  if($result){
		  $total_students=$row['total_students'];
		  echo " Total number of students is :".$total_students;
	  }
	  else{
		  echo " Some Error Ocured";
	  }
	  ?>
	  <html>
	  <body style="background-color:rgb(200,190,170)">
	  <a href="logout.php" style="padding-left:1250px;color:blue;font-size:20px">Logout</a>
	  <body>
	  <html>
	  <?php
  }


?>