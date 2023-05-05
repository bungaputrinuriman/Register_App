<?php 
//Define your Server host name here.
$HostName = "localhost";
 
//Define your MySQL Database Name here.
$DatabaseName = "id11189654_flutter_db";
 
//Define your Database User Name here.
$HostUser = "id11189654_root";
 
//Define your Database Password here.
$HostPass = "1234567890"; 
 
// Creating MySQL Connection.
$con = mysqli_connect($HostName,$HostUser,$HostPass,$DatabaseName);
 
// Storing the received JSON into $json variable.
$json = file_get_contents('php://input');
 
$obj = json_decode($json,true);
 
$name = $obj['name'];
 

 
$password = $obj['password'];
 

if(isset($check)){
 
	 $emailExist = 'Email Already Exist, Please Try Again With New Email Address..!';
	 
	$existEmailJSON = json_encode($emailExist);
	 
	 echo $existEmailJSON ; 
 
  }
 else{
 
	 $Sql_Query = "insert into user_registration (name,email,password) values ('$name','$password')";
	 
	 
	 if(mysqli_query($con,$Sql_Query)){
	 
		$MSG = 'User Registered Successfully' ;
		 
		$json = json_encode($MSG);
		 
		 echo $json ;
	 
	 }
	 else{
	 
		echo 'Try Again';
	 
	 }
 }
 mysqli_close($con);
?>