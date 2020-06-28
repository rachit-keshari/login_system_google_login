<?php

  session_start();
  $username=$_POST['username'];
  $password=$_POST['password'];
  $email=$_POST['email'];
  $f=$_FILES['myfile'];
  $str="photos/".$f['name'];
  $fsize=$f['size'];
  $fsize/=1024;
  $_SESSION['fname']=$f['name'];
  $_SESSION['ftype']=$f['type'];
  $_SESSION['fsize']=$fsize."KB";
  $_SESSION['error']=0;

  $conn=mysqli_connect('localhost','root','','logindb','3306');
  $q="select * from users where username='$username'";
  $run=mysqli_query($conn,$q);

  if($data=mysqli_fetch_assoc($run))
  {
    $_SESSION['username']=$username;
    $_SESSION['pic']=$f;
    $_SESSION['error']=$username.", this username already exists";
    mysqli_close();
  	header("Location:register1.php");
  }
  else if($_POST['username']=="" || $_POST['password']=="" || !isset($f))
  {
    $_SESSION['error']="fill all the fields & upload image";
    header("Location:register1.php");
  }
  else if(file_exists("photos/".$f['name']))
  {
    $_SESSION['error']="file name already exsist";
   	mysqli_close();
    header("Location:register1.php");
  }
  else if(!($f['type']=="image/jpeg" || $f['type']=="image/png"))
  {
  	$_SESSION['error']="upload a jpeg/png img file";
  	mysqli_close();
  	header("Location:register1.php");
  } 
  else
  {
  	$q="insert into users (username,password,email,picsource) values ('$username','$password','$email','$str')";
  	$run=mysqli_query($conn,$q);
  	move_uploaded_file($f['tmp_name'], "photos/".$f['name']);
  	mysqli_close();
  	header("Location:login.php");
  }

?>