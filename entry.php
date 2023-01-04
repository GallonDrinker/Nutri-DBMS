<?php
    session_start();
    $database_name = "chill_outs";
    $con = mysqli_connect("localhost","root","",$database_name);

    if (isset($_POST["add"])){
        if (isset($_SESSION["cart"])){
            $item_array_id = array_column($_SESSION["cart"],"product_id");
            if (!in_array($_GET["id"],$item_array_id)){
                $count = count($_SESSION["cart"]);
                $item_array = array(
                    'product_id' => $_GET["id"],
                    'item_name' => $_POST["hidden_name"],
                    'product_price' => $_POST["hidden_price"],
                    'item_quantity' => $_POST["quantity"],
                );
                $_SESSION["cart"][$count] = $item_array;
               
            }else{
                
            }
        }else{
            $item_array = array(
                'product_id' => $_GET["id"],
                'item_name' => $_POST["hidden_name"],
                'product_price' => $_POST["hidden_price"],
                'item_quantity' => $_POST["quantity"],
            );
            $_SESSION["cart"][0] = $item_array;
        }
    }

    if (isset($_GET["action"])){
        if ($_GET["action"] == "delete"){
            foreach ($_SESSION["cart"] as $keys => $value){
                if ($value["product_id"] == $_GET["id"]){
                    unset($_SESSION["cart"][$keys]);
                    
                }
            }
        }
    }
?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nutrition value</title>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <style>
        @import url('https://fonts.googleapis.com/css?family=Titillium+Web');

        *{
            font-family: 'Titillium Web', sans-serif;
        }
        .product{
            border: 1px solid #eaeaec;
            margin: -1px 19px 3px -1px;
            padding: 10px;
            text-align: center;
            background-color: #efefef;
        }
        table, th, tr{
            text-align: center;
        }
        .title2{
            text-align: center;
            color: #66afe9;
            background-color: #efefef;
            padding: 2%;
        }
        h2{
            text-align: center;
            color: #66afe9;
            background-color: #efefef;
            padding: 2%;
        }
        table th{
            background-color: #efefef;
        }
    </style>
</head>
<body>

    <div class="container" style="width: 65%">
        <h2>Food List</h2>
        <?php
            $query = "SELECT * FROM menu";
            $result = mysqli_query($con,$query);
            if(mysqli_num_rows($result) > 0) {

                while ($row = mysqli_fetch_array($result)) {

                    ?>
                    <div class="col-md-3">

                        <form method="post" action="entry.php?action=add&id=<?php echo $row["id"]; ?>">

                            <div class="product">
                                <img src="<?php echo $row["image"]; ?>" class="img-responsive">
                                <h5 class="text-info"><?php echo $row["item_name"]; ?></h5>
                                <h5 class="text-danger"><?php echo $row["price"]; ?></h5>
                                <input type="text" name="quantity" class="form-control" value="1">
                                <input type="hidden" name="hidden_name" value="<?php echo $row["item_name"]; ?>">
                                <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>">
                                <input type="submit" name="add" style="margin-top: 5px;" class="btn btn-success"
                                       value="Add to List">
                            </div>
                        </form>
                    </div>
                    <?php
                }
            }
        ?>

        <div style="clear: both"></div>
        <h3 class="title2">Total Nutrition Details</h3>
        <div class="table-responsive">
            <table class="table table-bordered">
            <tr>
                <th width="30%">Food Name</th>
                <th width="10%">Serve Quantity</th>
                <th width="13%">Calorie Per Serve</th>
                <th width="10%">Total Calorie</th>
                <th width="17%">Remove Food Item</th>
            </tr>

            <?php
                if(!empty($_SESSION["cart"])){
                    $totalz = 0;
                    $item_names = "";
                    foreach ($_SESSION["cart"] as $key => $value) {
                        ?>
                        <tr>
                            <td><?php $item_names .= $value["item_name"]."X".$value["item_quantity"]."\n"; echo $value["item_name"]; ?></td>
                            <td><?php echo $value["item_quantity"]; ?></td>
                            <td> <?php echo $value["product_price"]; ?></td>
                            <td>
                                 <?php echo number_format($value["item_quantity"] * $value["product_price"], 2); ?></td>
                            <td><a href="entry.php?action=delete&id=<?php echo $value["product_id"]; ?>"><span
                                        class="text-danger">Remove Food Item</span></a></td>

                        </tr>
                        <?php
                        $totalz = $totalz + ($value["item_quantity"] * $value["product_price"]);


                    }
                        ?>
                        

                        <?php
                        
                        include "threshold.php";
                        $z=$_SESSION['max'];
                        $va=$z;
                       $z= $z/100;
                       $z=$z*5;
                       ?>
                       <tr>
                            <td colspan="3" align="right">Threshold value</td>
                            <th align="right"> <?php echo number_format($z, 2); ?></th>
                            <td></td>
                        </tr>
                       <?php
                       
                       if($z<$totalz){
                        $y=$totalz-$z;
                        $za=1;
                        $_SESSION['ya'] =$y;
                        $_SESSION['za'] =$za;
                        $_SESSION['z'] =$va;

                       

            
                        ?>
                        <tr>
                            <td colspan="4" align="right">Total</td>
                            <th align="right"> <?php echo number_format($y, 2); ?></th>
                            <td></td>
                        </tr>
                        

                       <?php } ?>
                       <?php
                       
                       if($z>$totalz ){
                        $_SESSION['ya']=$totalz ;

                           
                           ?>
                           <tr>
                            <td colspan="3" align="right">Total</td>
                            <th align="right"> <?php echo number_format($totalz, 2); ?></th>
                            <td></td>
                        </tr>
                        
                        <?php
                    }
                ?>
            </table>
        </div>
        <?php
        $query2 = "SELECT * FROM chef";
        $result2 = mysqli_query($con,$query2);?>
        <div class="container">

        <form name = "entry" action="entryconfirm.php" method="post">
            
           
           
       

            
            



            <input type="hidden" name="total" value="<?php echo $total?>">
            <?php } ?>
            <input type="hidden" name="details" value="<?php echo $item_names?>">
            
            <!-- <select name="chef"> -->
                <!-- <?php  
                    
                    while ($row2 = mysqli_fetch_array(
                            $result2,MYSQLI_ASSOC)):; 
                ?>
                    <option value="<?php echo $row2["c_id"];
        
                    ?>">
                        <?php echo $row2["c_name"];
                        ?>
                    </option>
                <?php 
                    endwhile; 
                ?> -->
            <!-- </select> -->
            <!-- <div class="form-check">
                <input class="form-check-input" type="radio" name="payment_method" value = "online payment">
                <label class="form-check-label" for="flexRadioDefault1">
                    Online payment
                </label>
                <input class="form-check-input" type="radio" name="payment_method" value = "online payment" checked>
                <label class="form-check-label" for="flexRadioDefault2">
                    Cash on delivery
                </label>
            </div> -->
            <div class="text-center my-4"> <input type="submit" value="Submit"> </div>
        </form>
        <div class="text-center my-4"><a href="entrylist.php"> <input type="submit" value="Entry detailes"> </div><a>
        

    </div>


</body>
</html>