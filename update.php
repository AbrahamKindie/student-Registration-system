<?php
include('DBConnection.php');
if(isset($_POST['Search'])){
	if(!empty($_POST['dd'])){
		$id=$_POST['dd'];
	$sql="select * from student where id='$id'";
	$result = mysqli_query($conn,$sql);
	if(mysqli_num_rows($result)>0){
	?><html>
  <head>
  <title> Student Lists</title>
  <head>
  <body style="background-color:rgb(200,200,200)">
  <p style="color:black"><u><b>This is Student Lists the id you Entered :</b></u></p>
  <table border="1">
  <tr>
  <th>First name</th>
  <th>Middle name</th>
  <th>Last name</th>
  <th>Id</th>
  <th>email</th>
  <th>sex</th>
  <th>tele phone</th>
  <th>department</th>
  <th>Admision Type</th>
  <th>Level </th>
  </tr>
  <?php
  while($row = mysqli_fetch_array($result)){
		echo "<tr>";
		echo "<td>".$row['firstname']."</td>";
		echo "<td>".$row['middlename']."</td>";
		echo "<td>".$row['lastname']."</td>";
		echo "<td>".$row['id']."</td>";
		echo "<td>".$row['email']."</td>";
		echo "<td>".$row['sex']."</td>";
		echo "<td>".$row['phone']."</td>";
		echo "<td>".$row['department']."</td>";
		echo "<td>".$row['admision']."</td>";
		echo "<td>".$row['level']."</td>";
		echo "</tr>";
  }	
	?>
	
	</table>
	</body>
	</html>
	<?php
	
	}
	else{
	echo "<script>alert('0 results')</script>";
	}
	}
	else{
		echo"please enter your id";
	}
    $conn->close();
	}
	if(isset($_POST['Update'])){
	if(!empty($_POST['id'])&& !empty($_POST['fname'])&&!empty($_POST['mname'])&&!empty($_POST['lname'])&&!empty($_POST['Email']) &&!empty($_POST['gender'])
		&& !empty($_POST['telephone'])&&!empty($_POST['date'])	&&!empty($_POST['departments'])&&!empty($_POST['Admision'])	&&!empty($_POST['levels'])){
       $id=$_POST['id'];
	   $fnam =$_POST['fname'];
	 $mnam =$_POST['mname'];
	 $lnam =$_POST['lname'];
	 $em =$_POST['Email'];
	 $dbsex=$_POST['gender'];
	 $tele=$_POST['telephone'];
	 $ken=$_POST['date'];
	 $dep=$_POST['departments'];
	 $adm=$_POST['Admision'];
	 $lev=$_POST['levels'];
	 	 $sql="SELECT * FROM `student` WHERE id='$id'";
	 $result=mysqli_query($conn,$sql);
	 $row= mysqli_num_rows($result);
	     if($row>0){
	 $sqlit="UPDATE `student` SET `firstname`='$fnam',`middlename`='$mnam',`lastname`='$lnam',`email`='$em',`sex`='$dbsex',
	 `phone`='$tele',`date`='$ken',`department`='$dep',`admision`='$adm',`level`='$lev' WHERE id='$id'";
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
			echo"<script>alert('there is no students information with this id')</script>";
		}
		}
		else{
			echo"All fillds are required";
		}
	}
	  ?>
	<html>
	<head>
	<script type="text/javascript">
	function phoneValidation(){
		var regexp=/^(09|\+2519|\+2517|\07)[0-9]{8}$/;
		 let phone = document.getElementById("ppp").value;
		 var id=document.getElementById("ab").value;
	if(regexp.test(phone)){
		if(id.length==8){
			return true;
		  }
		  else{
			window.alert(" please enter valid id");
		return false;  
		  }
			return true;
	       }
	
	    else{
		window.alert(" please enter valid phone number");
		return false;
	        }
	}
		</script>
	</head>
	<body style="background-color:rgb(200,200,255)">
	<header style="text-align:center;background-color:rgb(50,50,255);width:1370px;height:80px;padding-top:40px;font-size:30px;color:white"> 
	You Can Change The Informations Of a Student By Entering The Student Id.<br>
	<a href="logout.php" style="padding-left:1250px;color:white;font-size:20px">Logout</a>
	</header><br>
	<form action="Add.html" method="POST">
	 <input type="submit" value="<- Back" style="float:left;background-color:rgb(100,255,100);color:white;border:none;width:70px;height:30px;margin-top:30px;margin-left:30px ">
	</form><br>
	   <p style="text-align:center"> <i>Enter The Student Id To Change Information Of a Student.<br> 
	   </i> </p>
	   <form action="" method="POST">
	   Id To search The User:<br><input type="text" name="dd" placeholder="Enter the id" style="height:30px" required>
     <input type="submit" name="Search"  style="color:white; background-color:blue;
     height:30px; width:100px;border:none" value="Search"><br><br>
 </form>
	<nav style="background-color:rgb(150,150,200); margin-right:0px;margin-left:20px;padding-left:50px ">
       <form action="" method="POST">
	          user Id :<br><input type="text" name="id" placeholder="Enter the id" style="height:30px" required><br>
            First Name:<br>
            <input type="text" name="fname" id="fn" placeholder="Enter first name"><br>
			Middle Name:<br>
            <input type="text" name="mname" id="mn" placeholder="Enter middle name"><br>
			Last Name:<br>
            <input type="text" name="lname" id="ln" placeholder="Enter last name"><br>
		    Email:<br>
            <input type="text"  name="Email" id="eml" placeholder="Enter your email"><br><br>
			Gender:<br>
			<input type="radio" name="gender" id="gen" value="M" > Male<br>
           <input type="radio" name="gender" id="gen" value="F"> Female<br><br>
		    Phone Number:<br>
		   <input type="tel" name="telephone" id="ppp"  placeholder=" enter phone number"><br><br>
		   Date You Apply:<br>
		   <input type="date" name="date" id="dat" placeholder=" date"><br><br>
		   Department:<br>
	       <select name="departments" id="dep">
                <option value="computer science">computer science</option>
                <option value="software engineering">software engineering</option>
                <option value="Managment">Managment</option>
                <option value="accounting">accounting</option>
				<option value="Aggreculture">Aggreculture</option>
				<option value="information technology">information technology</option>
				<option value="land administration">land administration</option>
				<option value="Environmental Science">Environmental Science</option>
          </select>
          <br><br>
		   Admision Type:<br>
			<input type="radio" id="adm" name="Admision" value="Regular" > Regular<br>
           <input type="radio" id="adm" name="Admision" value="Extension"> Extension<br><br>
		   Level You Apply:<br>
	       <select name="levels" id="lvl">
                <option value="Bsc. Degree">Bsc. Degree</option><br>
                <option value="Masters">Masters</option><br>
			</select><br><br>
		  <input type="reset"  value="Clear" style="background-color:blue ;width:70px;height:30px ; color:white"><br><br>
          <input type="submit" name="Update" value="Update" style="background-color:blue ;width:250px;height:40px ; color:white" onclick="phoneValidation();">
       </form>
	</nav>
	</div>
	 <footer style="background-color:rgb(70,200,100);margin-top:100px;width:1350px;height:100px;">
     <h1 style="text-align:center;padding-top:30px">St. Mary University (kdste Maryam University) </h1>
     </footer>
	<body>
	</html>