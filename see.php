<?php
    include('DBConnection.php');
    if(isset($_POST['veiw'])){
		 if(!empty($_POST['id'])){
	$id=$_POST['id'];
	$sql="SELECT `firstname`, `middlename`, `lastname`, `id`, `email`, `password`, `sex`, `phone`, `date`, `department`, 
	`admision`, `level` FROM `student` WHERE id='$id'";
	$result = mysqli_query($conn,$sql);
	if(mysqli_num_rows($result)>0){
	?><html>
  <head>
  <title> Student Lists</title>
  <head>
  <body style="background-color:rgb(200,200,200)">
  <header style="background-color:black;height:180px;width:1370px">
  <img src="ab.jpg" style="width:1370px; height:150px" >
  <a href="logout.php" style="padding-left:1250px;color:white">Logout</a>
  </header>
  <p style="color:red"><u><b>This Is Your Information You Entered when You Registered  In St.Mary's University :</b></u></p>
  <table border="1">
  <tr>
  <th>First name</th>
  <th>Middle name</th>
  <th>Last name</th>
  <th>Id</th>
  <th>email</th>
  <th>password</th>
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
		echo "<td>".$row['password']."</td>";
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
	echo "<script>alert('0 results')</script>";
	}
 }
    else{
	echo "please enter your id";
	}
    $conn->close();
	}
	
      ?>