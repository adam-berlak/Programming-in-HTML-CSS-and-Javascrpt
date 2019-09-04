<?php
   include('session.php');
?>
<html">
   
   <head>
      <title>Wallet</title>
      <script>
      function goBack() {
          window.history.back()
      }
      </script>
   </head>
   
   <body>
      <h1>Wallet <?php echo $login_session; ?></h1> 
<?php   
   $user_check = $_SESSION['login_user'];
   $sql = "SELECT FUNDS FROM WALLET WHERE CUST_EMAIL = '$user_check'";
   $retval = mysqli_query($db,$sql);
   
   if(! $retval ) {
      die('Could not get data: ' . mysqli_error());
   }
   
    $row = mysqli_fetch_array($retval, MYSQL_ASSOC);
      echo "Funds : {$row['FUNDS']}  <br> ".
         "--------------------------------- <br> ";
   echo "<br />"
?>
      <button onclick="window.location.href='addFunds.php'">Add Funds to Wallet</button><br /><br />
<?php   
   $user_check = $_SESSION['login_user'];
   $sql = "SELECT NAME, NUMBER, EXPIRY, SECCODE FROM CREDITCARD WHERE CUST_EMAIL = '$user_check'";
   $retval = mysqli_query($db,$sql);
   
   if(! $retval ) {
      die('Could not get data: ' . mysqli_error());
   }
   
   echo "Card Numbers: <br> ".
       "--------------------------------- <br> ";
   while($row = mysqli_fetch_array($retval, MYSQL_ASSOC)) {
      echo "Name : {$row['NAME']}  <br> ".
         "Number : {$row['NUMBER']} <br> ".
         "Expiry : {$row['EXPIRY']} <br> ".
         "Security Code : {$row['SECCODE']} <br> ".
         "--------------------------------- <br> ";
   }
   echo "<br />"
?>
      <button onclick="window.location.href='newCC.php'">Add a Credit Card</button>
      <button onclick="window.location.href='delCC.php'">Delete a Credit Card</button><br /><br />
<?php   
   $sql = "SELECT SNUM, SNAME, CITY, PCODE FROM BILLINGADDRESS WHERE CUST_EMAIL = '$user_check'";
   $retval = mysqli_query($db,$sql);
   
   if(! $retval ) {
      die('Could not get data: ' . mysqli_error());
   }
   echo "Billing Addresses: <br> ".
       "--------------------------------- <br> ";
   while($row = mysqli_fetch_array($retval, MYSQL_ASSOC)) {
      echo "Street Number : {$row['SNUM']}  <br> ".
         "Street Name : {$row['SNAME']} <br> ".
         "City : {$row['CITY']} <br> ".
         "Postal Code : {$row['PCODE']} <br> ".
         "--------------------------------- <br> ";
   }
   echo "<br />"
?>
      <button onclick="window.location.href='newBA.php'">Add a Billing Address</button>
      <button onclick="window.location.href='delBA.php'">Delete a Billing Address</button><br /><br />
      <button onclick="window.location.href='profile.php'">Go to profile page</button>
      <button onclick="window.location.href='StorePage.php'">Go to store page</button>
      <button onclick="window.location.href='logout.php'">Sign Out</button>
   </body>
   
</html>