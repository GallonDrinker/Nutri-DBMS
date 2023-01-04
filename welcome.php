<?php 
include_once 'dbconnect.php';
session_start();
$userid = $_SESSION['id'];

$sql = "SELECT u.id,COUNT(o.order_id) AS num_order FROM user AS u LEFT join entrys AS o on(u.id = o.user_id) WHERE u.id =$userid  GROUP BY u.id; ";
$rs = $conn-> query($sql);
$data = mysqli_fetch_array($rs);

$num_of_orders = $data['num_order'];
 
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Welcome</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        
        <!-- Masthead-->
        <header class="masthead">
            <div class="container">
                <div class="masthead-subheading">Hey <?php echo $_SESSION['name'];?>! Welcome To Nutri & LyFE!</div>
                <div class="masthead-heading text-uppercase">It's Nice To Meet You</div>
                <div class="masthead-subheading">Looks like you are concerened about health</div>
                <div class="masthead-subheading">You Added <?php echo $num_of_orders;?> entries total</div>
                <a class="btn btn-primary btn-xl text-uppercase" href="entry.php">Calorie intake Entry</a>
                <a class="btn btn-primary btn-xl text-uppercase" href="book.php">Get an appointment</a>
                <a class="btn btn-primary btn-xl text-uppercase" href="demo.php">BMI Calculator</a>
            </div>
        </header>
        
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
