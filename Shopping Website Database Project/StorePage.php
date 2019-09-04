<?php
include('session.php'); //Need to include the session before the html code.
?>

<html">
   
   <head>
   <style>
      <title>Store </title>
	  
	body {
		margin: 0;
	}
	
	ul {
		list-style-type: none;
		margin: 0;
		padding: 0;
		width: 25%;
		background-color: #f1f1f1;
		position: fixed;
		height: 100%;
		overflow: auto;
		border: 1px solid #ddd;
	}

	li a {
		display: block;
		color: #000;
		padding: 8px 16px;
		text-decoration: none;
		border-bottom: 1px solid #ddd;
	}

	li a.active {
		background-color: #4CAF50;
		color: white;
	}
	
	li a.home {
		background-color: #00B6FF;
		color: white;
	}

	li a:hover:not(.active) {
		background-color: #555;
		color: white;
	}
	
	table {
		border-collapse: collapse;
	}
	table, th, td {
		border: 1px solid black;
	}
	th, td {
		padding: 10px;
	}
	th {
		background-color: #A26FBC;
		color: white;
	}
	tr:hover {
		background-color: #CBD3CE;
	}
	tr:nth-child(even) {
		background-color: #EAEFEC;
	}
	tr:nth-child(odd) {
		background-color: #FFFFFF;
	}
	tr:nth-child(odd):hover {
		background-color: #CBD3CE;
	}
	tr:nth-child(even):hover {
		background-color: #CBD3CE;
	}
   </style>
   <link rel = "stylesheet" type="text/css" href="style.css"/>
   </head>
   <body>
      <h1>Store <?php //echo $login_session; ?></h1> 
	  
	  <ul class="mainMenu">
		<li><a class="home" href="StorePage.php">Home</a></li>
		<li><a <?php if(isset($_GET['hw'])){echo "class = 'active'";}?> href="StorePage.php?hw=True">Hardware</a></li>
		<li><a <?php if(isset($_GET['sy'])){echo "class = 'active'";}?> href="StorePage.php?sy=True">Systems</a></li>
		<li><a <?php if(isset($_GET['sw'])){echo "class = 'active'";}?> href="StorePage.php?sw=True">Software</a></li>
		<li><a <?php if(isset($_GET['nw'])){echo "class = 'active'";}?> href="StorePage.php?nw=True">Networking</a></li>
		<li><a <?php if(isset($_GET['ht'])){echo "class = 'active'";}?> href="StorePage.php?ht=True">Home Theatre</a></li>
		<li><a <?php if(isset($_GET['cm'])){echo "class = 'active'";}?> href="StorePage.php?cm=True">Cameras</a></li>
		<li><a <?php if(isset($_GET['as'])){echo "class = 'active'";}?> href="StorePage.php?as=True">Shopping Cart</a></li>
		
		
		<li><a href="profile.php">My Profile</a></li>
    </ul> 
	  
	  <div style="margin-left:25%;padding:1px 16px;height:1000px;">
		<?php       
            $itemLimit = 5;		//Show 5 items per page.
        //Should check which menu on the side is selected and select items with that ID
        if($_SERVER["REQUEST_METHOD"] == "POST") {
          // username and password sent from form 
          
            if(isset($_GET['as'])){
              $myusername = mysqli_real_escape_string($db,$_SESSION['login_user']);
              $myitem = mysqli_real_escape_string($db,$_POST['item']); 
          
              $sql = "DELETE FROM CART WHERE CUSTOMER_EMAILADDRESS = '$myusername' AND ITEMID = '$myitem';";
              $result = mysqli_query($db,$sql);
              if(! $result ){
                  echo "Item not in Cart!<br /><br />" . mysqli_error($db);
              }else{
                    echo "Item Removed From Shopping Cart Successfully!<br /><br />";
              }            
            }else{
              $myusername = mysqli_real_escape_string($db,$_SESSION['login_user']);
              $myitem = mysqli_real_escape_string($db,$_POST['item']); 
          
              $sql = "INSERT INTO CART (CUSTOMER_EMAILADDRESS, ITEMID) VALUES ('$myusername','$myitem');";
              $result = mysqli_query($db,$sql);
              if(! $result ){
                  echo "Item already in Cart!<br /><br />";
              }else{
                    echo "Item Placed in Shopping Cart Successfully!<br /><br />";
              }
            }
        }
      
      // If result matched $myusername and $mypassword, table row must be 1 row
          if(isset($_GET['hw'])){
				$sql = "SELECT DEPTID FROM DEPARTMENT WHERE DEPTNAME = 'Hardware'";
				$retval = mysqli_query($db, $sql);
				if(! $retval ){
					die('Could not get data: ' . mysqli_error($db));
				}
				$row = mysqli_fetch_assoc($retval);
                $dnum = $row['DEPTID'];
			}
			elseif(isset($_GET['sy'])){
				$sql = "SELECT DEPTID FROM DEPARTMENT WHERE DEPTNAME = 'Systems'";
				$retval = mysqli_query($db, $sql);
				if(! $retval ){
					die('Could not get data: ' . mysqli_error($db));
				}
				$row = mysqli_fetch_assoc($retval);
                $dnum = $row['DEPTID'];
			}
			elseif(isset($_GET['sw'])){
				$sql = "SELECT DEPTID FROM DEPARTMENT WHERE DEPTNAME = 'Software'";
				$retval = mysqli_query($db, $sql);
				if(! $retval ){
					die('Could not get data: ' . mysqli_error($db));
				}
				$row = mysqli_fetch_assoc($retval);
                $dnum = $row['DEPTID'];
			}
			elseif(isset($_GET['nw'])){
				$sql = "SELECT DEPTID FROM DEPARTMENT WHERE DEPTNAME = 'Networking'";
				$retval = mysqli_query($db, $sql);
				if(! $retval ){
					die('Could not get data: ' . mysqli_error($db));
				}
				$row = mysqli_fetch_assoc($retval);
                $dnum = $row['DEPTID'];
			}
			elseif(isset($_GET['ht'])){
				$sql = "SELECT DEPTID FROM DEPARTMENT WHERE DEPTNAME = 'Home Theatre'";
				$retval = mysqli_query($db, $sql);
				if(! $retval ){
					die('Could not get data: ' . mysqli_error($db));
				}
				$row = mysqli_fetch_assoc($retval);
                $dnum = $row['DEPTID'];
			}
			elseif(isset($_GET['cm'])){
				$sql = "SELECT DEPTID FROM DEPARTMENT WHERE DEPTNAME = 'Cameras'";
				$retval = mysqli_query($db, $sql);
				if(! $retval ){
					die('Could not get data: ' . mysqli_error($db));
				}
				$row = mysqli_fetch_assoc($retval);
                $dnum = $row['DEPTID'];
			}
			elseif(isset($_GET['as'])){
                   $user_check = $_SESSION['login_user'];
                   $sql = "SELECT * FROM CART WHERE CUSTOMER_EMAILADDRESS = '$user_check'";
                   $retval = mysqli_query($db,$sql);
                   $totalCost = 0.00;
                   if(! $retval ) {
                      die('Could not get data: ' . mysqli_error());
                   }
   
                   if(mysqli_num_rows($retval)==0){
                        echo "Cart is empty! <br><br>";
                   }
                   while($row = mysqli_fetch_array($retval, MYSQL_ASSOC)) {
                       $item = $row['ITEMID'];
                       $sql2 = "SELECT MODEL, PRICE FROM ITEM WHERE ID = '$item'";
                       $retval2 = mysqli_query($db,$sql2);
                       $row2 = mysqli_fetch_array($retval2, MYSQL_ASSOC);
                       echo "ID : {$row['ITEMID']}  <br> ".
                         "Model : {$row2['MODEL']}  <br> ".
                         "Price : \${$row2['PRICE']} <br> ";
						echo "<form method='POST' action=''><input type='hidden' name='item' value='{$row['ITEMID']}'><input type='submit' name='submit' id='GenericButton' value='Delete From Cart'></form>".
                         "--------------------------------- <br> ";
                       $totalCost = $totalCost + $row2['PRICE'];
                       $totalCost = number_format($totalCost, 2, '.', '');
                   }
                   echo "Total Cost: \$$totalCost <br><br>";
                   if((isset($_GET['checkout'])) and (mysqli_num_rows($retval)!=0)){
                        $rand = rand(1, 100000);
                        $sql = "SELECT FUNDS FROM WALLET WHERE CUST_EMAIL = '$user_check'";
                        $retval = mysqli_query($db, $sql);
                        if(! $retval ){
                            die('Could not delete data: ' . mysqli_error($db));
                        }
                        $row = mysqli_fetch_assoc($retval);
                        if($row['FUNDS']<$totalCost){
                            echo "Insufficient Funds!<br />";
                        }else{
                            echo "Order Processed<br />";
                            $sql = "UPDATE WALLET SET FUNDS = FUNDS - '$totalCost' WHERE CUST_EMAIL='$user_check';";
                            $retval = mysqli_query($db, $sql);
                            if(! $retval ){
                                die('Could not remove funds: ' . mysqli_error($db));
                            }
                            $sql = "SELECT * FROM CART WHERE CUSTOMER_EMAILADDRESS = '$user_check'";
                            $retval = mysqli_query($db, $sql);
                            if(! $retval ){
                                die('Could not select data: ' . mysqli_error($db));
                            }
                            while($row = mysqli_fetch_assoc($retval)){
                                $item = $row['ITEMID'];
                                $sql2 = "INSERT INTO `ORD`(`ORDERNUM`, `CEMAILADDRESS`, `ITEMID`, `TOTALCOST`) VALUES ('$rand', '$user_check', '$item', '$totalCost')";
                                $retval2 = mysqli_query($db, $sql2);
                                if(! $retval2 ){
                                    die('Could not insert data: ' . mysqli_error($db));
                                }
                            }
                            $sql = "UPDATE INVENTORY SET STOCK = STOCK - 1 WHERE ITEM_ID='$item';";
                            $retval = mysqli_query($db, $sql);
                            if(! $retval ){
                                die('Could not update inventory: ' . mysqli_error($db));
                            }
                            $sql = "DELETE FROM CART WHERE CUSTOMER_EMAILADDRESS = '$user_check'";
                            $retval = mysqli_query($db, $sql);
                            if(! $retval ){
                                die('Could not delete data: ' . mysqli_error($db));
                            }
                            $sql = "SELECT * FROM ADDRESS WHERE CUST_EMAIL = '$user_check'";
                            $retval = mysqli_query($db, $sql);
                            $row = mysqli_fetch_array($retval, MYSQL_ASSOC);
                            $snum = $row['SNUM'];
                            $sname = $row['SNAME'];
                            $city = $row['CITY'];
                            $pcode = $row['PCODE'];
                            $sql2 = "INSERT INTO `SHIPPINGADDRESS`(`ORDER_ORDNUM`, `SNUM`, `SNAME`, `CITY`, `PCODE`) VALUES ('$rand', '$snum', '$sname', '$city', '$pcode')";
                            $retval2 = mysqli_query($db, $sql2);
                            if(! $retval2 ){
                                die('Could not insert data: ' . mysqli_error($db));
                            }
                        }
                    }
                      $temp = $_SERVER['REQUEST_URI'];
					  $urlsplit = explode("&", $temp);
					  $urljoined = $urlsplit[0];
                      echo "<button onclick=\"window.location.href='$urljoined&checkout=True'\" id='CheckoutButton'><span>Checkout</span></button>";
                      echo "<button onclick=\"window.location.href='$urljoined'\" id='GenericButton'>Refresh</button><br /><br />";
                      echo "<button onclick=\"window.location.href='profile.php'\" id='GenericButton'>Go to profile page</button>";
                      echo "<button onclick=\"window.location.href='wallet.php'\" id='GenericButton'>Go to Wallet</button>";
                      echo "<button onclick=\"window.location.href='Order.php'\" id='GenericButton'>Orders</button><br /><br />";
                      echo "<button onclick=\"window.location.href='logout.php'\" id='GenericButton'>Sign Out</button><br /><br />";			}
			else{
        		echo "<h2>Featured Items: </h2>";
				echo "<table>";
				echo "<tr><th>Item ID</th><th>Model</th><th>Price</th><th>Cart</th></tr>";
				echo "<tr><td>431</td><td>Macbook Pro 13</td><td>\$1549.00</td><td><form method='POST' action=''><input type='hidden' name='item' value='431'><input type='submit' name='submit' id='GenericButton' value='Add'></form></td></tr>";
				echo "<tr><td>12876</td><td>USB Stereo Audio Adaptor</td><td>\$14.99</td><td><form method='POST' action=''><input type='hidden' name='item' value='12876'><input type='submit' name='submit' id='GenericButton' value='Add'></form></td></tr>";
				echo "<tr><td>23897</td><td>SAGE 50 2016 CA PREM 2U ACCOUNTING</td><td>\$574.99</td><td><form method='POST' action=''><input type='hidden' name='item' value='23897'><input type='submit' name='submit' id='GenericButton' value='Add'></form></td></tr>";
				echo "<tr><td>92034</td><td>D3400 Digital SLR Body</td><td>\$519.99</td><td><form method='POST' action=''><input type='hidden' name='item' value='92034'><input type='submit' name='submit' id='GenericButton' value='Add'></form></td></tr>";
				echo "<tr><td>1289323</td><td>Nightblade 3 VR7RD-019US Gaming PC</td><td>\$2099.99</td><td><form method='POST' action=''><input type='hidden' name='item' value='1289323'><input type='submit' name='submit' id='GenericButton' value='Add'></form></td></tr>";
				echo "</table>";
            }
            //Takes in the department number from the proper dept
			if(isset($_GET['hw']) OR isset($_GET['sy']) OR isset($_GET['sw']) OR isset($_GET['nw']) OR isset($_GET['ht']) OR isset($_GET['cm'])){			
        		echo "<h2>Items: </h2>";
				//Get the total number of items from the department.
				$sql = "SELECT count(ITEM.ID) FROM (ITEM LEFT OUTER JOIN INVENTORY ON ITEM.ID = INVENTORY.ITEM_ID) WHERE (ITEM.DEPT_ID = '$dnum' AND INVENTORY.STOCK>0) ORDER BY ITEM.ID;";
				$retval = mysqli_query($db, $sql);

				if(! $retval ){
					die('Could not get data: ' . mysqli_error($db));
				}
				$row = mysqli_fetch_array($retval, MYSQL_NUM);
				$itemCount = $row[0];

                if(isset($_GET["page"])){
                    $page = $_GET["page"] + 1;
                    $offset = $itemLimit * $page ;
                }else{
                    $page = 0;
                    $offset = 0;
                }
				//Retrieve a limit of 5 items.
				$left_rec = $itemCount - ($page * $itemLimit);
				$sql = "SELECT ITEM.ID, ITEM.MODEL, ITEM.PRICE, INVENTORY.STOCK FROM (ITEM LEFT OUTER JOIN INVENTORY ON ITEM.ID = INVENTORY.ITEM_ID) WHERE (ITEM.DEPT_ID = '$dnum' AND INVENTORY.STOCK>0) ORDER BY ITEM.ID LIMIT $offset, $itemLimit;";
				$retval = mysqli_query($db, $sql);
				
				if(! $retval ){
					die('Could not get data: ' . mysqli_error($db));
				}
				
				//Creating the table of items.
				echo "<table>";
				echo "<tr><th>Item ID</th><th>Model</th><th>Price</th><th>Cart</th></tr>";
				while($row = mysqli_fetch_assoc($retval)){
					//echo('ID: ' . $row['ID'] . ' | ' . 'Model: ' . $row['MODEL'] . ' | ' . 'Price: ' . $row['PRICE'] . ' | ' . '<br /><br />');
					echo "<tr><td>{$row['ID']}</td><td>{$row['MODEL']}</td><td>\${$row['PRICE']}</td><td><form method='POST' action=''><input type='hidden' name='item' value='{$row['ID']}'><input type='submit' name='submit' id='GenericButton' value='Add'></form></td></tr>";
				}
				echo "</table>";
				
                if( $left_rec < $itemLimit ) {
                    $last = $page - 2;
                    $temp = $_SERVER['REQUEST_URI'];
					$urlsplit = explode("&", $temp);
					$urljoined = $urlsplit[0];
                    echo "<br /><button onclick=\"window.location.href='$urljoined&page=$last'\" id='GenericButton'>Last 5 Records</button>";
                }else if( $page > 0 ) {
                    $last = $page - 2;
                    $temp = $_SERVER['REQUEST_URI'];
					$urlsplit = explode("&", $temp);
					$urljoined = $urlsplit[0];
                    echo "<br /><button onclick=\"window.location.href='$urljoined&page=$last'\" id='GenericButton'>Last 5 Records</button>  ";
                    echo "<button onclick=\"window.location.href='$urljoined&page=$page'\" id='GenericButton'>Next 5 Records</button>";
                }else if( $page == 0 ) {
                    $temp = $_SERVER['REQUEST_URI'];
					$urlsplit = explode("&", $temp);
					$urljoined = $urlsplit[0];
                    echo "<br /><button onclick=\"window.location.href='$urljoined&page=$page'\" id='GenericButton'>Next 5 Records</button>";
                }
            }
		?>
	</div>
	
	<!--Allows elements to have a defined position. Useful for buttons that would make sense to have on every page.-->
	<div style="position: absolute; top: 0; right: 0;"><button onclick="window.location.href='profile.php'" id='GenericButton'>My Account</button></div>
	div + button {
		float: right;
	}
	  
   </body>
   
</html>