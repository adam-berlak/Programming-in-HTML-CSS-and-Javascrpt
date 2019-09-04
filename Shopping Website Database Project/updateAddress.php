<?php
   include('session.php');
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      
      $myusername = mysqli_real_escape_string($db,$_SESSION['login_user']);
      $snum = mysqli_real_escape_string($db,$_POST['snum']); 
      $sname = mysqli_real_escape_string($db,$_POST['sname']);
      $city = mysqli_real_escape_string($db,$_POST['city']); 
      $pcode = mysqli_real_escape_string($db,$_POST['pcode']);
      
      $sql = "UPDATE ADDRESS SET SNUM = '$snum', SNAME = '$sname', CITY = '$city', PCODE = '$pcode' WHERE CUST_EMAIL = '$myusername';";

      $result = mysqli_query($db,$sql);
   
       if(! $result ) {
          die('Could not update address: ' . mysqli_error());
       }
      header("location: profile.php");
   }
?>
<html>
   
   <head>
      <title>Update Address</title>
      
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
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Update Address</b></div>
				
            <div style = "margin:30px">
               
               <form action = "" method = "POST">
                  <label>Street Number  :</label><input type = "text" name = "snum" class = "box" pattern="[0-9\s]{1,}" required title="Numeric only"/><br /><br />
                  <label>Street Name  :</label><input type = "text" name = "sname" class = "box" pattern="[A-Za-z0-9\s]{1,}" required title="Alphanumeric only"/><br /><br />
                  <label>City  :</label><input type = "text" name = "city" class = "box" pattern="[A-Za-z0-9]{1,}" required title="Alphanumeric only"/><br /><br />
                  <label>Postal Code  :</label><input type = "text" name = "pcode" class = "box" pattern="[A-Za-z0-9]{6,}" required title="Alphanumeric only"/><br /><br />
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