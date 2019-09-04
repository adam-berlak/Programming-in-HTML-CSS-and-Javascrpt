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
      <title>My Orders</title>
      
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
      <h1>Orders <?php echo $login_session; ?></h1>
<?php
   $user_check = $_SESSION['login_user'];
   $sql = "SELECT * FROM ORD WHERE CEMAILADDRESS = '$user_check'";
   $retval = mysqli_query($db,$sql);
   
   if(! $retval ) {
      die('Could not get data: ' . mysqli_error());
   }
   $sql2 = "SELECT DISTINCT ORDERNUM, TOTALCOST FROM ORD WHERE CEMAILADDRESS = '$user_check'";
   $retval2 = mysqli_query($db,$sql2);
   if(! $retval2 ) {
      die('Could not select distinct data: ' . mysqli_error());
   }
   
   while($row2 = mysqli_fetch_array($retval2, MYSQL_ASSOC)) {
      echo "Order : {$row2['ORDERNUM']}  <br> ";
      echo "Total Cost : \${$row2['TOTALCOST']}  <br> ";
      while($row = mysqli_fetch_array($retval, MYSQL_ASSOC)){
         if($row2['ORDERNUM']==$row['ORDERNUM']){
             echo "Item: {$row['ITEMID']}  <br> ";
         }
      }
        $retval = mysqli_query($db,$sql);
      echo "<br />";
  }
?>				
            <div style = "margin:30px">
               
               <button onclick="window.location.href='StorePage.php'">Go to Store</button>
               <button onclick="window.location.href='wallet.php'">Go to Wallet</button>
               <button onclick="window.location.href='logout.php'">Sign Out</button>
               <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>

   </body>
</html>