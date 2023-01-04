<html>
<head>

<title>Login and Registration from</title>
   
<link rel="stylesheet" type="text/css" href="style.css"> 
<link href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
 
</head>
<body>


   <div class ="loginbox">
       <img src="avatar.png" class="avatar">




       <h1>Login Here</h1>
       <form  class="login100-form validate-form p-b-33 p-t-5" method="POST" action="logincheck.php">

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="username" placeholder="User name">
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="pass" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
					</div>

					<div class="container-login100-form-btn m-t-32">
						<button type = "submit" class="login100-form-btn " name="Login">
							Login
						</button>
						
					</div>
					<div class="container-login100-form-btn m-t-32">
					<a href="create.php">Creat New Account</a> 
					</div>

		</form>
       
   </div> 

  




   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


</body>
<style>
.background-image{
    background-image: url('pic1.jpg');
    background-size: contain;
    background-repeat: no-repeat;
    width: 400px;
    height: 400px;
}
</style>
</html>



