<?php
   include('sessionEmp.php');
?>
<html">
   
   <head>
      <title>Welcome Employee</title>
      <link rel = "stylesheet" type="text/css" href="style.css"/>
   </head>
   
   <body>
      <h1>Welcome Employee<?php echo $login_session; ?></h1> 
      <button onclick="window.location.href='newItem.php'" id = "GenericButton">Add an Item</button>
      <button onclick="window.location.href='delItem.php'" id = "GenericButton">Delete an Item</button>
      <button onclick="window.location.href='updateInv.php'" id = "GenericButton">Update Inventory</button><br /><br />
      <button onclick="window.location.href='logout.php'" id = "GenericButton">Sign Out</button><br />
   </body>
   
</html>