<?php
   include('session.php');
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      
      $myusername = mysqli_real_escape_string($db,$_SESSION['login_user']);
      $mynumber = mysqli_real_escape_string($db,$_POST['number']);
      
      $sql = "DELETE FROM CREDITCARD WHERE CUST_EMAIL='$myusername' AND NUMBER='$mynumber';";
      
      if($db->query($sql)==TRUE){       //try executing the query
          header("location: wallet.php");}
       else{
         $error = "Cannot Delete Card";
       }
   }
?>
<html>
   
   <head>
      <title>Delete a Credit Card</title>
      
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
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Delete a Credit Card</b></div>
				
            <div style = "margin:30px">
               
               <form action = "" method = "POST">
                  <label>Card Number  :</label><input type="text" name="number" pattern="[0-9]{1,}" title="Only numbers allowed" required /><br/><br />
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