<?Php
    include('DBConnection.php');
    if(isset($_POST['Forget'])){
		if(!empty($_POST['tele']))
		{
		$phone=$_POST['tele'];
		$passlen=8;
		$chars='0123456789';
		$password=substr(md5(rand($chars,$chars)),$passlen);
		$text="your new passwored";
		$message="Your New Passwred:$password";
		$url="https://sms.localhost/127.0.0.1/send?phone=$phone$text=$message";
		file_get_contents($url);
	    $sql="UPDATE `student` SET 'password'='$password' WHERE phone='$phone'";
		 $result=mysqli_query($conn,$sql);
	     if($result){
		echo"Your New Password Has Been Sent To Your phone";
		 }
		 else{
			 echo "Error Occured";
		 }
		}
		 else{
			 echo "enter your phone";
		 }
		 
	}
		 ?>
<html>
<head>
<title> forget passwored</title>
</head>
<body style="background-color:lightgray">
<header style="background-color:purple;height:100px;width:1370px">
</header><br><br>
<div style="margin-left:250px">
<form action="" method="POST">
phone:   <input type="text" name="tele" placeholder="enter your phone" style="background-color:lightgray;height:40px;width:200px" required>
<br><br>
      <input type="submit" name="Forget" value="forget" style="background-color:blue;border:none;height:40px;width:150px;margin-left:50px" >
</form>
</div>
<body>
<html>