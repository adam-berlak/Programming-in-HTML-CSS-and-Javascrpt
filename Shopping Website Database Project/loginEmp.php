<?php
   include("config.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      
      $sql = "SELECT EID FROM EMPLOYEE WHERE EID = '$myusername' and LASTNAME = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         $_SESSION['login_emp'] = $myusername;
         
         header("location: welcomeEmp.php");
      }else {
         $error = "Your EID or Last Name is invalid";
      }
   }
?>
<html>
   
   <head>
      <title>Employee Login Page</title>
      <link rel = "stylesheet" type="text/css" href="style.css"/>
   </head>
   
   <body bgcolor = "#FFFFFF">
	
      <div align = "center">
         <div style = "width:600px; border: solid 1px #333333; " align = "center"; id = container>
            <div id = title align = "center" ><b>Employee Login</b></div>
				
            <div style = "margin:30px">
               
               <form action = "" method = "post">
                  <label>EID  :</label><input type = "text" name = "username" class = "box"/><br /><br />
                  <label>Last Name  :</label><input type = "text" name = "password" class = "box" /><br/><br />
                  <input type = "submit" value = " Submit " id = "GenericButton"/>
                  <input type="reset" id = "GenericButton"/>
               </form>
               
                  <button onclick="window.location.href='login.php'" id = "GenericButton">Customer Login</button>
                  <button onclick="window.location.href='loginAdmin.php'" id = "GenericButton">Admin Login</button>
               <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
					
            </div>
				
         </div>
			
      </div>

   </body>
</html>