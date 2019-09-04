<?php
   include('sessionEmp.php');
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      
      $myid = mysqli_real_escape_string($db,$_POST['id']); 
      $mystock = mysqli_real_escape_string($db,$_POST['stock']);
      
      $sql = "UPDATE INVENTORY SET STOCK = '$mystock' WHERE ITEM_ID = '$myid';";

      $sql2 = "SELECT ITEM_ID FROM INVENTORY WHERE ITEM_ID = '$myid';";
      $result = mysqli_query($db,$sql2);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      if($count == 1){
          if($db->query($sql)==TRUE){       //try executing the query
              echo"Update successful";}
           else{
             $error = "Item couldn't update";
           }
        }
       else{
         $error = "Item doesn't exist";
       }
   }
?>
<html>
   
   <head>
      <title>Update Item Stock</title>
      <link rel = "stylesheet" type="text/css" href="style.css"/>
   </head>
   
   <body bgcolor = "#FFFFFF">
	
      <div align = "center">
         <div style = "width:600px; border: solid 1px #333333; " align = "left" id = container>
            <div align = "center" style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Update Item Stock</b></div>
				
            <div style = "margin:30px">
               
               <form action = "" method = "POST">
                  <label>ID  :</label><input type = "text" name = "id" class = "box" pattern="[0-9]{1,}" required title="Numeric only"/><br /><br />
                  <label>Stock  :</label><input type="text" name="stock" class = "box" pattern="[0-9]{1,}" title="Numeric only" required /><br/><br />
                  <input type="submit" value = " Submit " id="GenericButton"/>
                  <input type="reset" id="GenericButton"/>
               </form>
                  <button onclick="window.location.href='welcomeEmp.php'" id="GenericButton">Back to Welcome Page</button>
               
               <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
					
            </div>
				
         </div>
			
      </div>

   </body>
</html>