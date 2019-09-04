<?php
   include("config.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      
      $sql = "SELECT USERID FROM ADMINISTRATOR WHERE USERID = '$myusername' AND PASSWORD = '$mypassword';";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched ID, table row must be 1 row
		
      if($count == 1) {
         $_SESSION['login_admin'] = $myusername;
         
         header("location: updateAdmin.php");
      }else {
         $error = "Your ID or Password is invalid";
      }
   }
?>
<html>
   
   <head>
      <title>Admin Login Page</title>
      <link rel = "stylesheet" type="text/css" href="style.css"/>      
   </head>
   
   <body bgcolor = "#FFFFFF">
	
      <div align = "center">
         <div style = "width:600px; border: solid 1px #333333; " align = "center" id= "container">
            <div id = "title" align = "center"><b>Admin Login</b></div>
				
            <div style = "margin:30px">
               
               <form action = "" method = "post">
                  <label>ID  :</label><input type = "text" name = "username" class = "box"/><br /><br />
                  <label>Password  :</label><input type = "text" name = "password" class = "box"/><br /><br />
                  <input type = "submit" value = " Submit " id = "GenericButton"/>
                  <input type="reset" id = "GenericButton"/>
               </form>
               
                  <button onclick="window.location.href='login.php'" id = "GenericButton">Customer Login</button>
                  <button onclick="window.location.href='loginEmp.php'" id = "GenericButton">Employee Login</button>
               <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
					
            </div>
				
         </div>
			
      </div>

   </body>
</html>