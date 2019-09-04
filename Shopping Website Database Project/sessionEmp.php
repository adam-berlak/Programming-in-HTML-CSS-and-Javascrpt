<?php
   include('config.php');
   session_start();
   
   $user_check = $_SESSION['login_emp'];
   
   $ses_sql = mysqli_query($db,"select EID from EMPLOYEE where EID = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

   $login_session = $row['username'];
   
   if(!isset($_SESSION['login_emp'])){
      header("location:loginEmp.php");
   }
?>