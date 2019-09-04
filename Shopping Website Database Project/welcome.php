<?php
   include('session.php');
?>
<html">
   
   <head>
      <title>Welcome </title>
   </head>
   
   <body>
      <h1>Welcome <?php echo $login_session; ?></h1> 
	  <button onclick="window.location.href='StorePage.php'">Store</button>
      <button onclick="window.location.href='profile.php'">Go to Profile Page</button>
      <button onclick="window.location.href='logout.php'">Sign Out</button>
   </body>
   
</html>