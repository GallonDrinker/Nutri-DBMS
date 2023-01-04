<?php
   include_once 'dbconnect.php';
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      
      $name = $_POST['name'];
      $email = $_POST['Email'];
      $password =$_POST['password'];
      $confirm_password =$_POST['confirm_password'];
      if (empty($email)) {
        echo '<script>alert("Enter email adress")</script>';
        exit();
      }else {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo '<script>alert("Please enter a valid email adress")</script>';
            exit();

        }
      }

      if($password != $confirm_password){
        echo '<script>alert("password did not match")</script>';
        exit();
      }
      else{
        $sql = "INSERT INTO user (name, email, password) VALUES ('$name', '$email', '$password');";
        $rs = $conn-> query($sql);
        echo '<script>alert("account created successfully")</script>';

      }
      
      
		
      
   }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <title>Document</title>
</head>
<body>


<form action="create.php" method="post">
  <h2>Sign Up</h2>
        <p>
			<label for="Email" class="floatLabel">User Name</label>
			<input id="name" name="name" type="text">
		</p>
		<p>
			<label for="Email" class="floatLabel">Email</label>
			<input id="Email" name="Email" type="text">
		</p>
		<p>
			<label for="password" class="floatLabel">Password</label>
			<input id="password" name="password" type="password">
		</p>
		<p>
			<label for="confirm_password" class="floatLabel">Confirm Password</label>
			<input id="confirm_password" name="confirm_password" type="password">
			
		</p>
		<p>
			<input type="submit" value="Create My Account" id="submit">
		</p>
	</form>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    
</body>
<style>
    @import "compass/css3";

$button: rgba(148,186,101,0.7);

body {
  background: #384047;
  font-family: sans-serif;
  font-size: 10px
}
form {
  background: #fff;
  padding: 4em 4em 2em;
  max-width: 500px;
  margin: 50px auto 0;
  box-shadow: 0 0 1em #222;
  border-radius: 2px;
  h2 {
    margin:0 0 50px 0;
    padding:10px;
    text-align:center;
    font-size:30px;
    color:darken(#e5e5e5, 50%);
    border-bottom:solid 1px #e5e5e5;
  }
  p {
    margin: 0 0 3em 0;
    position: relative;
  }
  input {
    display: block;
    box-sizing: border-box;
    width: 100%;
    outline: none;
    margin:0;
  }
  input[type="text"],
  input[type="password"] {
    background: #fff;
    border: 1px solid #dbdbdb;
    font-size: 1.6em;
    padding: .8em .5em;
    border-radius: 2px;
  }
  input[type="text"]:focus,
  input[type="password"]:focus {
    background: #fff
  }
  span {
    display:block;
    background: #F9A5A5;
    padding: 2px 5px;
    color: #666;
  }
  input[type="submit"] {
    background: $button;
    box-shadow: 0 3px 0 0 darken($button, 10%);
    border-radius: 2px;
    border: none;
    color: #fff;
    cursor: pointer;
    display: block;
    font-size: 2em;
    line-height: 1.6em;
    margin: 2em 0 0;
    outline: none;
    padding: .8em 0;
    text-shadow: 0 1px #68B25B;
  }
  input[type="submit"]:hover {
    background: rgba(148,175,101,1);
    text-shadow:0 1px 3px darken($button, 30%);
  }
  input[type="submit"]:hover {
    
  }
  label{
    position: absolute;
    left: 8px;
    top: 12px;
    color: #999;
    font-size: 16px;
    display: inline-block;
    padding: 4px 10px;
    font-weight: 400;
    background-color: rgba(255,255,255,0);
    @include transition(color .3s, top .3s, background-color .8s);
    &.floatLabel{
      top: -11px;
      background-color: rgba(255,255,255,0.8);
      font-size: 14px;
    }
	}
  
}
    </style>
</html>
