<?php
   include('session.php');
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      
      $myusername = mysqli_real_escape_string($db,$_SESSION['login_user']);
      $myfname = mysqli_real_escape_string($db,$_POST['fname']); 
      $myminitial = mysqli_real_escape_string($db,$_POST['minitial']);
      $mylname = mysqli_real_escape_string($db,$_POST['lname']); 
      
      $sql = "UPDATE CUSTOMER SET FNAME = '$myfname', MINITIAL = '$myminitial', LNAME = '$mylname' WHERE EMAILADDRESS = '$myusername';";

      $result = mysqli_query($db,$sql);
   
       if(! $result ) {
          die('Could not update address: ' . mysqli_error());
       }
      header("location: profile.php");
   }
?>
<html>
   
   <head>
      <title>Update Name</title>
      
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
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Update Name</b></div>
				
            <div style = "margin:30px">
               
               <form action = "" method = "POST">
                  <label>First Name  :</label><input type = "text" name = "fname" class = "box" pattern="[A-Za-z]{1,}" required title="Only characters allowed"/><br /><br />
                  <label>Middle Initial  :</label><input type = "text" name = "minitial" class = "box" pattern="(?=.*[a-z])(?=.*[A-Z]){1}" required title="1 character long only"/><br/><br />
                  <label>Last Name  :</label><input type = "text" name = "lname" class = "box" pattern="[A-Za-z]{1,}" required title="Only characters allowed"/><br /><br />
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