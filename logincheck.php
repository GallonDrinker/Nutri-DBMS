<?php
   include_once 'dbconnect.php';
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $username = $_POST['username'];
      $password =$_POST['pass'];

      echo $username.$password;
      
      $sql = "SELECT id,email,password,name FROM user WHERE email = '$username' and password = '$password'";
      $rs = $conn-> query($sql);
      $data = mysqli_fetch_array($rs);
      
      $count = mysqli_num_rows($rs);
      
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         $_SESSION['name'] = $data[3];
         $_SESSION['id'] = $data[0];
         
        header("Location: welcome.php");
        exit();

         
      }else {
         echo "Your Login Name or Password is invalid";
      }
   }
?>