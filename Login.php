<?php
include('DBConnection.php');
    if(isset($_POST['Login']))
    {
        if(!empty($_POST['uname']) && !empty($_POST['pass'])){
            $user=$_POST['uname'];
            $pass=$_POST['pass'];
            $sql="select * from admin";
            $result=mysqli_query($conn,$sql);
            if($result){
                while($row=mysqli_fetch_assoc($result)){
                    $dbusername=$row['username'];
                    $dbpassword=$row['password'];
                    if($dbusername==$user and $dbpassword == $pass){
						echo "<br>". " successfully loged in";
                session_start();
                $_SESSION['user']=$dbusername;
                header("location:Add.html");  
                        
                    }
                    else{
                        echo "<br>"."username or password doesnot match with the db usename and password";
                    }
                }

            }
            else{
                echo " username or password Error!";
            }
        }
        else{
            echo " All feilds are Required!!";
        }
    }
    ?>
	<html>
<head><title>Admin page</title></head>
<body style="background-color:LightGray; background-image:url('cap.jpg');">
<!--nav style="background-color:rgb(100,100,100)"-->
<header style="background-color:rgb(255,100,100) ;width:1370px;height:200px">
<form action="index.html" method="POST">
	 <input type="submit" value="<- prev" style="float:left;background-color:green;color:white;border:none;width:70px;height:30px;margin-left:20px;margin-top:30px">
	</form>
	<h1 style="color:white;text-align:center; padding-top:50px">St. Mary University</h1>
<h1 style=" text-align:center;color:black"> Wellcome Administratore <h1>
</header>
<h2 style=" text-align:center;color:blueblack">This is Admin page or inteface Only For Admins. If You Are Not Admin Don't Veiw this page!!<br>
you May be Punish!!  The Admins can Enter Your Correct Username And Password And Login To This Page.<h2> 
   <form action="Login.php" method="POST">
            UserName:<br>
            <input type="text" name="uname" placeholder="Enter username" style="height:30px"><br>
            Password:<br>
            <input type="password" name="pass" placeholder="Enter password" style="height:30px"><br><br>
        
      <input type="submit" name="Login" value="Login" style="background-color:blue;border:none;height:40px;width:200px;color:white" >
        </form>
   </form>
   </nav>
   <div style="background-color:black;width:1370px;height:150px;margin-top:120px">
	<h1 style="color:white;text-align:center;padding-top:50px">St. Mary University</h1>
	</div>
	<p style="text-align:center"> St.Mary's University Is The Best Private University  In Ethiopia For<br>
	        All Peoples That Want To Learn And Get Knowledge . <br>
	        Also Can Get Different Bachulers And Masters Degrees.</p>
<body>
<html>
