<?php
   include("config.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      $myfname = mysqli_real_escape_string($db,$_POST['fname']);
      $myminitial = mysqli_real_escape_string($db,$_POST['minitial']); 
      $mylname = mysqli_real_escape_string($db,$_POST['lname']);
      $mysnum = mysqli_real_escape_string($db,$_POST['snum']); 
      $mysname = mysqli_real_escape_string($db,$_POST['sname']);
      $mycity = mysqli_real_escape_string($db,$_POST['city']); 
      $mypcode = mysqli_real_escape_string($db,$_POST['pcode']);
      
      $sql = "INSERT INTO CUSTOMER (EMAILADDRESS, FNAME, MINITIAL, LNAME, PASSWORD) VALUES ('$myusername', '$myfname', '$myminitial', '$mylname', '$mypassword');";
      
      if($db->query($sql)==TRUE){       //try executing the query
         $sql = "INSERT INTO WALLET (CUST_EMAIL, FUNDS) VALUES ('$myusername', 0.00);";
         if($db->query($sql)==TRUE){       //try executing the query
             $sql = "INSERT INTO ADDRESS (CUST_EMAIL, SNUM, SNAME, CITY, PCODE) VALUES ('$myusername', '$mysnum', '$mysname', '$mycity', '$mypcode');";
             if($db->query($sql)==TRUE){       //try executing the query
                header("location: login.php");}
               else{
                 $error = "Error Adding Address";}
           }else{
             $error = "Error Creating Wallet";
      }}
       else{
         $error = "Email already used";
       }
   }
?>
<html>
   
   <head>
      <title>Create User Page</title>
      <link rel = "stylesheet" type="text/css" href="style.css"/>
      
   </head>
   
   <body bgcolor = "#FFFFFF">
	
      <div align = "center">
         <div style = "width:600px; border: solid 1px #333333; " align = "left"; id = container>
            <div id = title align = "center"><b>Create Account</b></div>
				
            <div style = "margin:30px">
               
               <form action = "" method = "POST">
                  <label>Email  :</label><input type = "text" name = "username" class = "box" autofocus="autofocus" pattern="[^@]+@[^@]+\.[a-zA-Z]{2,}" required title="Enter a valid email"/><br /><br />
                  <label>Password  :</label><input type="password" name="password" class = "box" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required /><br/><br />
                  <label>First Name  :</label><input type = "text" name = "fname" class = "box" pattern="[A-Za-z]{1,}" required title="Only characters allowed"/><br /><br />
                  <label>Middle Initial  :</label><input type = "text" name = "minitial" class = "box" pattern="(?=.*[a-z])(?=.*[A-Z]){1}" required title="1 character long only"/><br/><br />
                  <label>Last Name  :</label><input type = "text" name = "lname" class = "box" pattern="[A-Za-z]{1,}" required title="Only characters allowed"/><br /><br />
                  <label>Street Number  :</label><input type = "text" name = "snum" class = "box" pattern="[A-Za-z0-9\s]{1,}" required title="Input Street Number"/><br /><br />
                  <label>Street Name  :</label><input type="text" name="sname" class = "box" pattern="[A-Za-z0-9\s]{1,}" title="Input street name" required /><br/><br />
                  <label>City  :</label><input type = "text" name = "city" class = "box" pattern="[A-Za-z\s]{1,}" required title="Only characters allowed"/><br /><br />
                  <label>Postal Code  :</label><input type = "text" name = "pcode" class = "box" pattern="[A-Za-z0-9]{6,}" required title="6 characters long with no spaces"/><br/><br />
                  <input type="submit" value = " Submit " id = "GenericButton"/>
                  <input type="reset" id = "GenericButton"/>
               </form>
                  <button onclick="window.location.href='login.php'" id = "GenericButton">Back to Login</button>
               
               <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
					
            </div>
				
         </div>
			
      </div>

   </body>
</html>