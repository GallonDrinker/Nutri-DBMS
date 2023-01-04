<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Calorie Entry History</title>
  </head>
  <body>



    <h1 style="text-align: center;">Calorie Ledger</h1>
    <br>
    

    <table class="table">
  <thead>
    <tr>
      <th scope="col">Details</th>
      <th scope="col">Total Calorie</th>
      <!-- <th scope="col">Pyment Method</th> -->
     
    </tr>
  </thead>
  <tbody>
  <?php

$db = mysqli_connect("localhost", "root", "", "chill_outs");
session_start();
$ab= $_SESSION['id'] ;

$sql = "Select * from entrys where user_id='$ab'";
$result=mysqli_query($db,$sql);
while($row = mysqli_fetch_array($result)){

   $no=$row['order_id'];
  
  
  ?>




    <tr>
      
      <td><?php echo $row['details']?></td>
      <td><?php echo $row['total_price']?></td>
      <!-- <td><?php echo $row['payment_method']?></td> -->
      <?php echo"<td><a href='entrydelete.php?entry_id=$no'><button  type='button' class='btn btn-success' >Delete</button></td>";?>
    </tr>
    <?php } ?>
   
  </tbody>
</table>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>