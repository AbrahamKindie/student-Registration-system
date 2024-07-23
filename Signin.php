<?php
include('DBConnection.php');
    if(isset($_POST['Signin']))
    {
        if(!empty($_POST['Id']) && !empty($_POST['pass'])){
            $user=$_POST['Id'];
            $pas=$_POST['pass'];
            $sql="select * from `student` where id='$user' and password='$pas'";
            $result=mysqli_query($conn,$sql);
            if($result){
                while($row=mysqli_fetch_assoc($result)){
                    $dbid=$row['id'];
                    $dbpassword=$row['password'];
                   if($dbid==$user and $dbpassword==$pas){		
                     session_start();
                    $_SESSION['user']=$dbid;
				     header("location:Veiw.html");
				       }
                    else{
                        echo "id or password does not match!";
                    }
                }

            }
            else{
                echo "id or password Error!";
            }
        }
        else{
            echo " All feilds are required";
        }
    }
    ?>
	<html>
<head><title>Student page</title></head>
<body style="background-color:rgb(100,200,200);">
<header style="background-color:blue">
<h1 style="color:white ; text-align:center"> Wellcome Student. I Hope That St.Mary's University  Is Comfortable  for You!!!! <h1>
<p style="color:black ; text-align:center"> please Login At This page Before Doing Other actions. <p>
</header>
<div style="margin-left:100px">
<form action="user.php" method="POST">
<input type="submit" value="Back" style="background-color:blue;color:white;border:none">
</form>
   <form action="" method="POST">
            User Id:<br>
            <input type="text" name="Id" placeholder="Enter username" required><br>
            Password:<br>
            <input type="password" name="pass" placeholder="Enter password" required><br><br>
            <input type="submit" name="Signin" value="Signin" style="background-color:blue;border:none ;width:150px; height:37px">
   </form>
   </div>
   <img src="other.jpg" style="height:350px; width:1345px">
<body>
<html>