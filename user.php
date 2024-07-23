<?php
include('DBConnection.php');
if(isset($_POST['submit']))
{
    if(!empty($_POST['fname'])&&!empty($_POST['mname'])&&!empty($_POST['lname'])&&!empty($_POST['Id']) && !empty($_POST['Email']) && !empty($_POST['pass']) 
		&& !empty($_POST['gender'])&&!empty($_POST['telephone'])&&!empty($_POST['date'])&&!empty($_POST['departments'])&&!empty($_POST['Admision'])&&!empty($_POST['levels'])){
     $fnam =$_POST['fname'];
	 $mnam =$_POST['mname'];
	 $lnam =$_POST['lname'];
	 $id=$_POST['Id'];
	 $em =$_POST['Email'];
     $pa =$_POST['pass'];
	 $dbsex=$_POST['gender'];
	 $tele=$_POST['telephone'];
	 $ken=$_POST['date'];
	 $dep=$_POST['departments'];
	 $adm=$_POST['Admision'];
	 $lev=$_POST['levels'];
	 $sql="SELECT * FROM `student` WHERE id='$id'";
	 $result=mysqli_query($conn,$sql);
	 $row= mysqli_num_rows($result);
	     if($row==0){
    $sqlit ="insert into student(firstname,middlename,lastname,id, email, password,sex,phone,date,department,admision,level) values('$fnam',
	'$mnam','$lnam','$id','$em','$pa','$dbsex','$tele','$ken','$dep','$adm','$lev')";
      $res=mysqli_query($conn,$sqlit);
	  if($res){
		   session_start();
                $_SESSION['fname']=$fnam;
				$_SESSION['mname']=$mnam;
				$_SESSION['lname']=$lnam;
				$_SESSION['user']=$id;
				$_SESSION['Email']=$em;
				$_SESSION['gender']=$dbsex;
				$_SESSION['telephone']=$tele;
				$_SESSION['departments']=$dep;
				$_SESSION['Admision']=$adm;
				$_SESSION['levels']=$lev;
		 ?>
		<h2><b style="color:red">Hey, welcome :- </b><?=$_SESSION['fname'];?>!</h2><br>
        <?php
		echo "Thank you!!   you Are Successfully registered";
		?>
       <br><br><div style="margin-left:50px">
            <form action="Signin.php" method="POST" >
                 <input type="submit" name="login" value="Login" style="background-color:blue; color:white; border:none ">
           </form>
        </div>
		<?php
		}
		
        else{
            echo "not registered please try again!";
        }
	 
		}
		else{
			echo"<script>alert('id already exists please try again')</script>";
		}
		}
    else{
        echo "All fields are required!')";
    }
}
?>
<html>
    <head>
        <title>User registration</title>
		<link rel="stylesheet" type="text/css" href="link.css">
		<script type="text/javascript">
		function generateRandomId() {
    var charset = '0123456789';
    var randomString = 'smu/';

    for ( var i = 0; i < 5; i++)		
        randomString += charset.charAt(Math.floor(Math.random()*charset.length));
	document.getElementById("id").value=randomString;
    }
	</script>
	<script type="text/javascript">
	function phoneValidation(){
		var regexp=/^(09|\+2519|\+2517|\07)[0-9]{8}$/;
		 let password = document.getElementById("ppp").value;
	if(regexp.test(password)){
			return true;
	       }
	    
	    else{
		window.alert(" please enter valid phone number");
		return false;
	        }
	}
		</script>
    </head>
    <body style="background-color:rgb(100,200,70)">
	<header style="background-color:black;height:150px;width:1370px">
	<form action="index.html" method="POST">
	 <input type="submit" value="<- prev" style="float:left;background-color:white;color:blue;border:none;width:70px;height:30px;margin-top:30px ">
	</form>
	<h1 style="text-align:center;color:white"><b> Any Body That Hase A Desire can Register From Here.
	<br>And All Requirements Must Fill. Unless You Will Not be Register.</b></h1>
	</header>
	<h2 style="text-align:center;color:black"><i> Please Fill All Requirements ,Then Click Submit Button 
	                                              To Submit Your FullFiling Requirements.</i></h2>
	 <p># Get Your Id  By Clicking The Below <a href="#">My Id </a> Button!</p>
	 <button  type="button" class="mami" onclick="generateRandomId()" style="background-color:blue;color:white;padding-bottom:20px; margin-left:50px;width:70px;height:30px;border:none">My Id</button>
	<div>  <img src="student.jpg"  style="float:right ;width:1020px;height:800px;">
	<nav style="background-color:rgb(100,200,200); margin-right:1090px;padding-left:30px;overflow:scrol">
       <form  name="form1" action="" method="POST">
            First Name:<br>
            <input type="text" name="fname" placeholder="Enter first name" required><br>
			Middle Name:<br>
            <input type="text" name="mname" placeholder="Enter middle name" required><br>
			Last Name:<br>
            <input type="text" name="lname" placeholder="Enter last name" required><br>
			Id:<br>
			<input type="text" name="Id" id="id" readonly><br>
		    Email:<br>
            <input type="email"  name="Email" placeholder="Enter your email" required><br>
            Password:<br>
            <input type="password" name="pass"  placeholder="Enter password" required><br><br>
			Gender:<br>
			<input type="radio" name="gender" value="M" > Male<br>
           <input type="radio" name="gender" value="F"> Female<br><br>
		    Phone Number:<br>
		   <input type="tel" name="telephone" id="ppp"  placeholder=" enter phone number" required><br><br>
		   <input type="date" name="date" placeholder=" date" required><br><br>
		   Department:<br>
	       <select name="departments" required>
                <option value="computer science">computer science</option>
                <option value="software engineering">software engineering</option>
                <option value="Managment">Managment</option>
                <option value="accounting">accounting</option>
				<option value="Aggreculture">Aggreculture</option>
				<option value="information technology">information technology</option>
				<option value="land administration">land administration</option>
				<option value="Environmental Science">Environmental Science</option>
				<option value="Economics">Economics</option>
				<option value="Banking And Finance">Banking And Finance</option>
          </select>
          <br><br>
		   Admision Type:<br>
			<input type="radio" name="Admision" value="Regular" > Regular<br>
           <input type="radio" name="Admision" value="Extension"> Extension<br><br>
		   Level You Apply:<br>
	       <select name="levels" required>
                <option value="Bsc. Degree">Bsc. Degree</option><br>
                <option value="Masters">Masters</option><br>
			</select><br><br>
			<input type="checkbox" name="check" value=" agree" required>do you want to learn from St.Mary's university<br><br>
		  <input type="checkbox" name="check" value="sure " required>do you agree to pay the required payment<br><br>
		  <input type="reset"  value="Clear" style="background-color:blue ;width:70px;height:30px ; color:white">&nbsp
          <input type="submit" name="submit" value="Submit" style="background-color:blue ;width:250px;height:40px ; color:white" onclick="phoneValidation();">
       </form>
	</nav>
	</div>
	<footer>
	<img src="ab.jpg" style="width:1370px ; height:200px;">
	</footer>
    <body>
	<html>