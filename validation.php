<?php

session_start();
$username=$_POST['username'];
$password=$_POST['password'];

$conn=mysqli_connect('localhost','root','','loginDB','3308');

$q="select * from users where username='$username' && password='$password'";
$run=mysqli_query($conn,$q);

if($data=mysqli_fetch_assoc($run))
{
	$_SESSION['username']=$username;
	header("Location:home.php");
}
else
{
   header("Location:login.php");
}


?>