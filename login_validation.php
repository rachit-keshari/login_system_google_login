<?php

session_start();
$username=$_POST['username'];
$password=$_POST['password'];

$conn=mysqli_connect('localhost','root','','logindb','3306');

$q="select * from users where username='$username' && password='$password'";
$run=mysqli_query($conn,$q);

if($data=mysqli_fetch_assoc($run))
{
	$_SESSION['username']=$username;
	$_SESSION['pic']=$data['picsource'];
	$_SESSION['email']=$data['email'];
	header("Location:home.php");
}
else
{
   header("Location:login.php");
}


?>