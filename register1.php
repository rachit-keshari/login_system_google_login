<!DOCTYPE html>
<html>
<head>
   <title>Login System</title>
   <style type="text/css">
      h1
      {
         background-color: lightpink;
         text-align: center;
         margin: 10px;
         padding:10px;
      }
      h3
      {
         margin: 10px;
         padding:10px;         
      }
      #div1
      {  
         background-color: lightblue;
         margin: 10px;
         padding:10px;
         padding-bottom: 20px;
         display: flex;
         flex-direction: row;    
         flex-wrap: wrap;          
      }
      #div2
      {
         background-color: lightgreen;
         margin: 10px;
         padding:10px;
         padding-bottom: 20px;  
      }      
      body
      {
         background-color: black;
         font-family: franklin gothic medium;
      }
      table
      {
         border-style: solid;
         border-color: red;
         border-width: 2px;
         padding: 20px; 
      }
      h2
      {
         margin:10px;
      }
      td
      {
         padding:5px;         
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
         transition:1500ms;
         width:190px;
         border-bottom:2px solid black;  
      }      

   </style>
</head>
<body>
   <h1>Login System</h1>
   <div id="div1">
      <div style=" margin-left: 484px; "></div>
      <div style=" margin-left: 10px; ">
      <h2 align="center">Enter your details :</h2>
      <form action="register_validation.php" method="post" enctype="multipart/form-data">
         <table align="center">
            <tr>
               <td>Username : </td>
               <td><input class="txt" type="text" name="username" placeholder="Username"></td>
            </tr>            
            <tr>
               <td>Password : </td>
               <td><input class="txt" type="password" name="password" placeholder="Enter Password"></td>
            </tr>
            <tr>
               <td>Email Id : </td>
               <td><input class="txt" type="text" name="email" placeholder="Email Id"></td>
            </tr>            
            <tr>
               <td>Upload profile pic :   </td>
               <td><input type="file" name="myfile"></td>
            </tr>        
            <tr>
               <td align="center"><input class="btn" type="Submit" name="" value=" Submit Details"></td>
            </tr>
         </table>
      </form>
      </div>
      <div style=" margin-left: 20px; ">  
          <h3 style="color:red;">error!!</h3>
         <table align="center">
            <?php
             session_start();
            ?>
             <tr>
               <td><?php echo $_SESSION['error']; ?></td>
            </tr>            
            <tr>
               <td>file name : <?php echo $_SESSION['fname']; ?></td>
            </tr>
             <tr>
               <td>file type : <?php echo $_SESSION['ftype']; ?></td>
            </tr>
             <tr>
               <td>file size : <?php echo $_SESSION['fsize']; ?></td>
            </tr>                        
         </table>
      </div>
   </div>   
   <div id="div2" align="center">
      <h2>Sign in :</h2>
      <form action="login.php" method="post"><input class="btn" type="submit" name="" value="Sign in"></form>
   </div>

</body>
</html>