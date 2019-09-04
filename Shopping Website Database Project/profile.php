<?php
   include('session.php');
?>
<html>
   
   <head>
      <script>
      function goBack() {
          window.history.back()
      }
      </script>
      <title>My Profile</title>
      
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
      <h1>Profile <?php echo $login_session; ?></h1>
      <h2>My Info</h2>
<?php
   $user_check = $_SESSION['login_user'];
   $sql = "SELECT EMAILADDRESS, PASSWORD, FNAME, MINITIAL, LNAME FROM CUSTOMER WHERE EMAILADDRESS = '$user_check'";
   $retval = mysqli_query($db,$sql);
   
   if(! $retval ) {
      die('Could not get data: ' . mysqli_error());
   }
   
   while($row = mysqli_fetch_array($retval, MYSQL_ASSOC)) {
      echo "Email : {$row['EMAILADDRESS']}  <br> ".
         "Password : {$row['PASSWORD']} <br> ".
         "First Name : {$row['FNAME']} <br> ".
         "Middle Initial : {$row['MINITIAL']} <br> ".
         "Last Name : {$row['LNAME']} <br><br> ";
   }
   $sql = "SELECT * FROM ADDRESS WHERE CUST_EMAIL = '$user_check'";
   $retval = mysqli_query($db,$sql);
   
   if(! $retval ) {
      die('Could not get data: ' . mysqli_error());
   }

    echo "<strong>Address: </strong><br />";
   while($row = mysqli_fetch_array($retval, MYSQL_ASSOC)) {
      echo "Street Number : {$row['SNUM']}  <br> ".
         "Street Name : {$row['SNAME']} <br> ".
         "City : {$row['CITY']} <br> ".
         "Postal Code : {$row['PCODE']} <br> ";
   }
?>				
            <div style = "margin:30px">
               
               <button onclick="window.location.href='updateName.php'">Update Name</button>
               <button onclick="window.location.href='updatePassword.php'">Update Password</button>
               <button onclick="window.location.href='updateAddress.php'">Update Address</button><br />
               <button onclick="window.location.href='StorePage.php'">Store</button>
               <button onclick="window.location.href='StorePage.php?as=True'">Cart</button>
               <button onclick="window.location.href='Order.php'">Orders</button>
               <button onclick="window.location.href='wallet.php'">Go to Wallet</button>
               <button onclick="window.location.href='logout.php'">Sign Out</button>
               <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>

   </body>
</html>