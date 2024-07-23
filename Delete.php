<?php
include('DBConnection.php');
if(isset($_POST['Delete']))
{
   if(!empty($_POST['id'])){
	$Id=$_POST['id'];
	$sql="select * from `student` WHERE id='$Id'";
	 $result=mysqli_query($conn,$sql);
	 $row= mysqli_num_rows($result);
	     if($row>0){
			 $sqli="DELETE FROM `student` WHERE id='$Id'";
			 $res=mysqli_query($conn,$sqli);
			 if($res){
			 
			 echo "<script>alert('Student with  id :_ ".$Id."  Successfilly Deleted')</script>";
			 }
			 else{
				 echo"Error occured to delete";
			 }
   }
   else{
	   echo "<script>alert('no information with this id');</script>";
   }
}else{
 echo "Please Enter Student Id To Delete";
}
}
?>
<html>
<head>
</head>
<body style="background-color:rgb(200,200,100)">
<header style="background-color:black;color:white;text-align:center;width:1370px;height:80px;padding-top:40px;font-size:50px">
St.Mary's University<br>
<a href="logout.php" style="padding-left:1250px;color:white;font-size:20px">Logout</a>
</header><br>
<form action="Add.html" method="POST">
	 <input type="submit" value="<- Back" style="float:left;background-color:rgb(100,100,255);color:white;border:none;width:70px;height:30px">
</form>
<p style="text-align:center;font-size:20px"><i>At This Page You Can Delete Student By Entering The Sudent Id.</i></p>
<form action="" method="POST" >
   <input type="text" name="id" placeholder="entr id" style="background-color:lightgray;height:30px"><br><br><br>
   <input type="submit" name="Delete" value="Delete" style="background-color:blue;width:120px;height:40px;color:white;border:none">
</form>
<body>
<html>