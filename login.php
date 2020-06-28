<?php

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

?>

<!DOCTYPE html>
<html>
<head>
     <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

   <title>Login System</title>
   <style type="text/css">
      h1
      {

         margin:10px;
         background-color: lightpink;
         text-align: center; 
         font-size: 50px;
      }
      h2
      {
         margin:10px;
      }
      #div1
      {  
         font-size: 30px;
         background-color: lightblue;
         margin: 10px;
         padding: 20px;
      }
      #div2
      {
         font-size: 30px;
         background-color: lightgreen;
         margin: 10px;
         padding:10px;  
         padding-bottom: 20px;
      }
      body
      {
         font-family: franklin gothic medium;
         background-color: black;
      }      
      table
      {
         font-size: 20px;
         border-style: solid;
         border-color: blue;
         border-width: 2px;

         padding: 20px; 
      }
      .btn
      {
         width:150px;
         background: white;
         font-family: franklin gothic medium;
         color: grey;
         box-shadow: 2px 2px grey;
         border-radius: 15px;
         border : 1px solid grey;
         margin: 10px;
         padding:2px;
      }
      .btn:hover
      {
         box-shadow:2px 2px white;
         background:grey;
         color:white;
      }
      .txt
      {
         width:125px;
         background: none;
         font-family: arial;
         color: black;
         border:none;
         border-bottom:2px solid white;
      }
      .txt:hover
      {
         transition:700ms;
         width:150px;
         border-bottom:2px solid black;  
      }

   </style>
</head>
<body>
   <h1>Login System</h1>
   <div id="div1">
      <h2 align="center">sign in here :</h2>
      <form action="login_validation.php" method="post">
         <table align="center">
            <tr>
               <td>username : </td>
               <td><input class="txt" type="text" name="username" placeholder="Enter Username"></td>
            </tr>
            <tr>
               <td>password : </td>
               <td><input class="txt" type="password" name="password" placeholder="Enter Password"></td>
            </tr>
            <tr>
               <td align="center"><input class="btn" type="Submit" name="" value=" Sign in"></td>
               <td>
   <?php
   if($login_button != '')
   {
       echo '<a href='.$login_button .'>Google login</a>';
   }
   
   ?>
        </td>
            </tr>
         </table>
      </form>
   </div>
   <div id="div2" align="center">
      <h2>new user register first :</h2>
      <form action="register.php" method="post"><input class="btn" type="submit" name="" value="Register"></form>
   </div>

</body>
</html>