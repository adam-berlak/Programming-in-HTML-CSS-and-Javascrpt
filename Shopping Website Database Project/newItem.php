<?php
   include('sessionEmp.php');
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      
      $myid = mysqli_real_escape_string($db,$_POST['id']); 
      $mymodel = mysqli_real_escape_string($db,$_POST['model']);
      $myprice = mysqli_real_escape_string($db,$_POST['price']); 
      $mydept = mysqli_real_escape_string($db,$_POST['dept']); 
      $mystock = mysqli_real_escape_string($db,$_POST['stock']); 
      
      $sql = "INSERT INTO ITEM (ID, MODEL, PRICE, DEPT_ID) VALUES ('$myid', '$mymodel', '$myprice', '$mydept');";
      $sql2 = "SELECT DEPTID FROM DEPARTMENT WHERE DEPTID = '$mydept';";
      $result = mysqli_query($db,$sql2);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      if($count == 1){
      if($db->query($sql)==FALSE){       //try executing the query
         $error = "Item ID already exists";
       }
       else{
          $sql = "INSERT INTO INVENTORY (ITEM_ID, STOCK, DEPT_DEPTID) VALUES ('$myid', '$mystock', '$mydept');";
          if($db->query($sql)==TRUE){       //try executing the query
                echo("Item entered successfully");
            } 
        else{
             $error = "Couldn't update inventory";
        }
       }
        }
        else{
            $error = "Department doesn't exist";
        }
        }
?>
<html>
   
   <head>
      <title>Add New Item</title>
      <link rel = "stylesheet" type="text/css" href="style.css"/>      
   </head>
   
   <body bgcolor = "#FFFFFF">
	
      <div align = "center">
         <div style = "width:600px; border: solid 1px #333333; " align = "left"; id = container;>
            <div align = "center" style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Add New Item</b></div>
				
            <div style = "margin:30px">
               
               <form action = "" method = "POST">
                  <label>ID  :</label><input type = "text" name = "id" class = "box" pattern="[0-9]{1,}" required title="Numeric only"/><br /><br />
                  <label>Model  :</label><input type="text" name="model" class = "box"/><br/><br />
                  <label>Price  :</label><input type = "text" name = "price" class = "box" pattern="^\d+\.\d{2}" required title="Enter dollar value"/><br /><br />
                  <label>Stock  :</label><input type = "text" name = "stock" class = "box" pattern="[0-9]{1,}" required title="Numeric only"/><br /><br />
                  <label>Dept number  :</label><input type = "text" name = "dept" class = "box" pattern="[0-9]{1,}" required title="Enter numberic value"/><br /><br />
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