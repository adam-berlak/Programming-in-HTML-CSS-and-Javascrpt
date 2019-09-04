<?php
   include('sessionAdmin.php');
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      
      $myq = mysqli_real_escape_string($db,$_POST['sql']); 
      
      $sql = $_POST['sql'];

      if($db->query($sql)==TRUE){       //try executing the query
          echo("Successful command");}
       else{
         $error = "Unsuccessful command";
       }
       }
?>
<html>
   
   <head>
      <title>SQL statement</title>
      
      <link rel = "stylesheet" type="text/css" href="style.css"/>
   </head>
   
   <body bgcolor = "#FFFFFF">
	
      <div align = "center">
         <div style = "width:500px; border: solid 1px #333333; " align = "left" id=container>
            <div id=title align="center" ><b>SQL statement</b></div>
				
            <div style = "margin:30px">
               
               <form action = "" method = "POST">
                  <label>SQL:  </label><input type = "text" autofocus="autofocus" name = "sql" class = "box"/><br /><br />
                  <input type="submit" value = " Submit " id="GenericButton"/>
                  <input type="reset" id="GenericButton"/>
               </form>
                <button onclick="window.location.href='logout.php'" id="GenericButton">Sign Out</button>
               
               <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
					
            </div>
				
         </div>
			
      </div>

   </body>
</html>