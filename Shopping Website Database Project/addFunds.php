<?php
   include('session.php');
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      
      $myusername = mysqli_real_escape_string($db,$_SESSION['login_user']);
      $mynumber = mysqli_real_escape_string($db,$_POST['amount']);
      
      $sql = "UPDATE WALLET SET FUNDS = FUNDS + '$mynumber' WHERE CUST_EMAIL='$myusername';";
      
      if($db->query($sql)==TRUE){       //try executing the query
          header("location: wallet.php");}
       else{
         $error = "Cannot Add Funds";
       }
   }
?>
<html>
   
   <head>
      <title>Add Funds to Wallet</title>
      
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
	
      <div align = "center">
         <div style = "width:600px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Add Funds to Wallet</b></div>
				
            <div style = "margin:30px">

                <form action = "" method = "POST">
                   
                    <?php
                        echo "Select Credit Card: ";
                        //CREATE SELECT FOR CREDIT CARD NUMBER
                        $myusername = mysqli_real_escape_string($db,$_SESSION['login_user']);
                        $sql="SELECT NUMBER FROM CREDITCARD WHERE CUST_EMAIL = '$myusername';";
                        $result = mysqli_query($db,$sql);
                        if(mysqli_num_rows($result)){
                        $select= '<select name="select">';
                        while($rs=mysqli_fetch_array($result)){
                              $select.='<option value="'.$rs['NUMBER'].'">'.$rs['NUMBER'].'</option>';
                          }
                        }
                        $select.='</select><br />';
                        echo $select;
                        
                         echo "Select Billing Address: ";
                       //CREATE SELECT FOR CREDIT CARD NUMBER
                        $sql="SELECT * FROM BILLINGADDRESS WHERE CUST_EMAIL = '$myusername';";
                        $result = mysqli_query($db,$sql);
                        if(mysqli_num_rows($result)){
                        $select= '<select name="select">';
                        while($rs=mysqli_fetch_array($result)){
                              $select.='<option value="'.$rs['SNUM'].$rs['SNAME'].$rs['CITY'].$rs['PCODE'].'">'.$rs['SNUM'].' '.$rs['SNAME'].', '.$rs['CITY'].', '.$rs['PCODE'].'</option>';
                          }
                        }
                        $select.='</select><br />';
                        echo $select;
                    ?>
                  <label>Amount  :</label><input type = "text" name = "amount" class = "box" pattern="^\d+\.\d{2}" required title="Enter dollar value"/><br /><br />
                <input type="submit" name="submitBttn" value="Submit">
                </form>
                
                   <button onclick="window.location.href='wallet.php'">Go back to wallet</button>
                  
                   <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
					
            </div>
				
         </div>
			
      </div>

   </body>
</html>