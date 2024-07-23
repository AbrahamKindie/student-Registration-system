<?php
include('DBconnection.php');
if(isset($_POST['update'])){
	if(!empty($_POST['id'])&& !empty($_POST['pass'])&&!empty($_POST['passs'])){
       $id=$_POST['id'];
	   $password =$_POST['pass'];
	   $pass=$_POST['passs'];
	 	 $sql="SELECT * FROM `student` WHERE id='$id'";
	 $result=mysqli_query($conn,$sql);
	 $row= mysqli_num_rows($result);
	     if($row>0){
			 while($row=mysqli_fetch_assoc($result)){
                    $oldpass=$row['password'];
			 if($oldpass==$password)
			 {
	 $sqlit="UPDATE `student` SET `password`='$pass' WHERE id='$id'";
	 $res=mysqli_query($conn,$sqlit);
	 if($res){
		 session_start();
         $_SESSION['user']=$id;
		 echo"successfully updated";
	 }
	 else{
		 echo"Error occured please try again!";
	 }
		}
		else{
			echo "<script>alert('incorrect old password')</script>";
		}
			 }
		 }
		else{
			echo"<script style='colore:red'>alert('incorrect  User id')</script>";
		}
		}
		else{
			echo"All fillds are required";
		}
	}
?>
<html>
<head>
<title> update password</title>
</head>
<body style="background-color:rgb(190,200,210)">
<header style="background-color:black;color:white;text-align:center;padding-top:40px;width:1370px;height:130px">
<h1><i>The Student In St. Mary's University</i></h1><br>
<a href="logout.php" style="float:right;color:blue;margin-right:20px;font-size:30px">logout</a>
</header>
<div style="background-color:white;width:1370px;height:180px">
  <p style="text-align:center;padding-top:60px"> Please enter your user id , old password and new password and ,after that you can udate your old password
        by new password</p>
		<form action="Signin.php" method="POST">
	 <input type="submit" value="<- Back" style="float:left;background-color:rgb(100,100,255);color:white;border:none;width:70px;height:30px;margin-top:30px;margin-left:30px ">
	</form><br>
</div><br><br>
<nav style="margin-left:300px">
<form action="" method="POST">
 User id:
   <input type="text" name="id" placeholder="Enter your id" style="border:none;height:30px;margin-left:45px" required ><br><br>
 old password:
   <input type="text" name="pass" placeholder=" Enter old password" style="border:none;height:30px;margin-left:5px" required><br><br>
 New password:
   <input type="text" name="passs" placeholder="Enter new password" style="border:none;height:30px" required><br><br><br><br>
  
   <input type="submit" name="update" value="change password" style="background-color:blue;color:white;border:none
   ;height:40px;margin-left:130px">  
</form>
</nav>
<footer style="background-color:rgb(70,200,100);margin-top:80px;width:1350px;height:100px;">
 <h1 style="text-align:center;padding-top:30px">St. Mary University (kdste Maryam University) </h1>
 </footer>
<body>
<html>