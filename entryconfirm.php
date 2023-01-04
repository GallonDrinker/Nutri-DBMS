<?php 
   include_once 'dbconnect.php';
   session_start();

   $to =  $_SESSION['ya'];

   $details = $_POST['details'];

   $user_id = (int)$_SESSION['id'];


   $sql = "INSERT INTO entrys (user_id,details,total_price) VALUES($user_id,'$details',$to);";
 
   $rs = $conn-> query($sql);

   if($rs){?>

      <h1> <?php echo "Calorie Intake entered successfully"?> </h1> <?php ;
   }?>
   <?php
   
   
   
   ?>