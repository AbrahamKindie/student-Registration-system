<?php
    include('DBConnection.php');
   if(isset($_POST['Search'])){
   if(!empty($_POST['dd'])){
	$id=$_POST['dd'];
	$sql="SELECT `firstname`, `middlename`, `lastname`, `id`, `email`, `sex`, `phone`, `date`, `department`, 
	`admision`, `level` FROM `student` WHERE id='$id'";
	$result = mysqli_query($conn,$sql);
	if(mysqli_num_rows($result)>0){
	?><html>
  <head>
  <title> Student information</title>
  <head>
  <body style="background-color:rgb(200,200,200)">
  <p style="color:red"><u><b>This Is the Information of the Id You Entered :</b></u></p>
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
	<body>
	<html>
	
	<?php
	}
	else{
	echo "0 results";
	}
 }
    else{
	echo "please enter your id";
	}
	$conn->close();
	}
     if(isset($_POST['Veiw'])){
	$sql="select * from student ORDER BY firstname ASC";
	$result = mysqli_query($conn,$sql);
	if(mysqli_num_rows($result)>0){
	?><html>
  <body style="background-color:rgb(200,200,200)">
  <header style="background-color:black;height:180px;width:1370px">
  <img src="ab.jpg" style="width:1370px; height:150px" >
  <a href="logout.php" style="padding-left:1250px;color:white">Logout</a>
  </header>
  <form action="Add.html" method="POST">
	 <input type="submit" value="<- Back" style="float:left;background-color:rgb(100,100,255);color:white;border:none;width:70px;height:30px;margin-top:30px;margin-left:30px ">
	</form><br>
 <form action="" method="POST">
   <br><br><input type="text" name="dd" placeholder="enter id" style="background-color:white;height:30px;border:none">
   <input type="submit" name="Search" value="Search" style="background-color:blue;width:120px;height:40px;color:white;border:none">
</form>
  <p style="color:black"><u><b>Those Are Student Lists In St.Mary's University :</b></u></p>
  <table border="1">
  <tr>
    <th>R.no</th>
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
       $x=0;
  while($row = mysqli_fetch_array($result)){
	      $x++;
		echo "<tr>";
		echo "<td>".$x."</td>";
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
	<footer style="background-color:blue ;width:1370px;height:100px;margin-top:150px">
	<h1 style="color:white;text-align:center">St. Mary University</h1>
	</footer>
	</body>
	</html>
	<?php
	
	}
	else{
	echo "<script>alert('0 results');</script>";
	}
    $conn->close();
	}
      ?>
  
 
  
  