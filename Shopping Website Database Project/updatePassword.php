<?php
   include('session.php');
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      
      $myusername = mysqli_real_escape_string($db,$_SESSION['login_user']);
      $mypass = mysqli_real_escape_string($db,$_POST['pass']); 
      
      $sql = "UPDATE CUSTOMER SET PASSWORD = '$mypass' WHERE EMAIL_ADDRESS = '$myusername';";

      $result = mysqli_query($db,$sql);
   
       if(! $result ) {
          die('Could not update address: ' . mysqli_error());
       }
      header("location: profile.php");
   }
?>
<html>
   
   <head>
      <title>Update Password</title>
      
      <style type = "text/css">
         body {
            font-family:Arial, Helvetica, sans-serif;
            font-size:14px;
         }
         
         label {
            font-weight:bold;
            width:100px;
            font-size:14px;
         }
         
         .box {
            border:#666666 solid 1px;
         }
      </style>
      
   </head>
   
   <body bgcolor = "#FFFFFF">
	
      <div align = "center">
         <div style = "width:600px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Update Password</b></div>
				
            <div style = "margin:30px">
               
               <form action = "" method = "POST">
                  <label>New Password:</label><input type = "text" name = "pass" class = "box" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required title="at least one number and one uppercase and lowercase letter, and at least 8 or more characters"/><br /><br />
                  <input type="submit" value = " Submit "/>
                  <input type="reset"/>
               </form>
                  <button onclick="window.location.href='profile.php'">Back to Profile Page</button>
               
               <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
					
            </div>
				
         </div>
			
      </div>

   </body>
</html>