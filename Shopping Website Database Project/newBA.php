<?php
   include('session.php');
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      
      $myusername = mysqli_real_escape_string($db,$_SESSION['login_user']);
      $mysnum = mysqli_real_escape_string($db,$_POST['SNUM']); 
      $mysname = mysqli_real_escape_string($db,$_POST['SNAME']);
      $mycity = mysqli_real_escape_string($db,$_POST['CITY']); 
      $mypcode = mysqli_real_escape_string($db,$_POST['PCODE']);
      
      $sql = "INSERT INTO BILLINGADDRESS (CUST_EMAIL, SNUM, SNAME, CITY, PCODE) VALUES ('$myusername', '$mysnum', '$mysname', '$mycity', '$mypcode');";
      
      if($db->query($sql)==TRUE){       //try executing the query
          header("location: wallet.php");}
       else{
         $error = "Address already in wallet";
       }
   }
?>
<html>
   
   <head>
      <title>Add New Billing Address</title>
      
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
         <div style = "width:300px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Add New Billing Address</b></div>
				
            <div style = "margin:30px">
               
               <form action = "" method = "POST">
                  <label>Street Number:  :</label><input type = "text" name = "SNUM" class = "box" pattern="[0-9]{1,}" required title="Only numbers allowed"/><br /><br />
                  <label>Street Name  :</label><input type="text" name="SNAME" pattern="[a-zA-Z0-9\s]{1,}" title="Alphanumeric only" required /><br/><br />
                  <label>City  :</label><input type = "text" name = "CITY" class = "box" pattern="[a-zA-Z\s]{1,}" required title="In form mm/yy"/><br /><br />
                  <label>Postal Code  :</label><input type = "text" name = "PCODE" class = "box" pattern="[a-zA-Z0-9]{1,}" required title="Alphanumeric only, no spaces"/><br/><br />
                  <input type="submit" value = " Submit "/>
                  <input type="reset"/>
               </form>
               <button onclick="window.location.href='wallet.php'">Go back to wallet</button>
               
               <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
					
            </div>
				
         </div>
			
      </div>

   </body>
</html>