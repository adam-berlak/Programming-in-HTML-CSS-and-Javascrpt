<?php
   include('sessionEmp.php');
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      
      $myid = mysqli_real_escape_string($db,$_POST['number']); 
      
      $sql = "DELETE FROM ITEM WHERE ID = '$myid';";
      if($db->query($sql)==TRUE){       //try executing the query
          $sql = "DELETE FROM INVENTORY WHERE ITEM_ID = '$myid';";
          if($db->query($sql)==TRUE){       //try executing the query
                echo("Item deleted successfully");
            } 
        else{
             $error = "Couldn't delete inventory";
        }
       }
        else{
            $error = "Couldn't delete item";
        }
   }
?>
<html>
   
   <head>
      <title>Delete an Item</title>
      <link rel = "stylesheet" type="text/css" href="style.css"/>
   </head>
   
   <body bgcolor = "#FFFFFF">
	
      <div align = "center">
         <div style = "width:600px; border: solid 1px #333333; " align = "left" id = container>
            <div align = "center" style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Delete an Item</b></div>
				
            <div style = "margin:30px">
               
               <form action = "" method = "POST">
                  <label>Item Number  :</label><input type="text" name="number" pattern="[0-9]{1,}" title="Only numbers allowed" required /><br/><br />
                  <input type="submit" value = " Submit " id = "GenericButton"/>
                  <input type="reset" id = "GenericButton"/>
               </form>
			   <button onclick="window.location.href='welcomeEmp.php'" id = "GenericButton">Back to Welcome Page</button>
               
               <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
					
            </div>
				
         </div>
			
      </div>

   </body>
</html>