<?php
   include('config.php');
   session_start();
   
   $user_check = $_SESSION['login_admin'];
   
   $ses_sql = mysqli_query($db,"select USERID from ADMINISTRATOR where USERID = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

   $login_session = $row['username'];
   
   if(!isset($_SESSION['login_admin'])){
      header("location:loginAdmin.php");
   }
?>