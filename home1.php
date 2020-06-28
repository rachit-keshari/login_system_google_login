<?php

//index.php

//Include Configuration File
include('config.php');

$login_button = '';


if(isset($_GET["code"]))
{

 $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);


 if(!isset($token['error']))
 {
 
  $google_client->setAccessToken($token['access_token']);

 
  $_SESSION['access_token'] = $token['access_token'];


  $google_service = new Google_Service_Oauth2($google_client);

 
  $data = $google_service->userinfo->get();

 
  if(!empty($data['given_name']) || !empty($data['family_name']))
  {
   $_SESSION['username'] = $data['given_name'].' '.$data['family_name'];
  }

  if(!empty($data['email']))
  {
   $_SESSION['email'] = $data['email'];
  }

  if(!empty($data['picture']))
  {
   $_SESSION['pic'] = $data['picture'];
  }
 }
}


if(!isset($_SESSION['access_token']))
{

 $login_button = $google_client->createAuthUrl();
}

   if(!isset($_SESSION['username']))
   {
   	header("Location:login.php");
   }
   $username=$_SESSION['username'];
   $email=$_SESSION['email'];

 ?>

<!DOCTYPE html>
<html>
<head>

	<style type="text/css">
		
		#h1_0
		{
			font-size: 50px;
			position: absolute;
			top:390px;
			left:40%;
		}
		#h1_1
		{
			font-size: 50px;
			position: absolute;
			top:480px;
			left:40%;
		}		
		p
		{
			position: absolute;
			top:570px;
			left:40%;
		}
		img
		{
			position: absolute;
			top:100px;
			left:40%;
		}	
		a
		{
			position: absolute;
			top:20px;
			left:40%;
		}					
	</style>
	<title></title>
</head>
<body    style="background-color: black;">
	<?php echo "<img src='".$_SESSION['pic']."' height='300px' width='300px' align='center' class='img-responsive img-circle img-thumbnail' />"; ?>
	<h1 id="h1_0" style=" color:white; ">Hello! <?php echo $username ?></h1>
	<h1 id="h1_1" style=" color:white; "><?php echo $email ?></h1>
	<p style=" color: white; align:center; ">login Successfull</p>
	<br>
	<p>
		<a href="logout1.php" style=" color:white; align:center; ">Logout</a>
	</p>

</body>
</html>