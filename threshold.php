<!-- <?php

$db = mysqli_connect("localhost", "root", "", "chill_outs");
//session_start();
$ab= $_SESSION['id'] ;
//$ab=1;
$total=0;
$total_coin=0;

$sql = "Select * from entrys where user_id='$ab'";
$result=mysqli_query($db,$sql);

while($row = mysqli_fetch_array($result)){

    $total=$total+$row['total_price'];
  
}
 $m=(int)$total/500;

$m=$m*100;
$sql = "Select * from entrys where user_id='$ab'";
$result=mysqli_query($db,$sql);

while($row = mysqli_fetch_array($result)){

    $total_coin=$total_coin+(int)$row['spendcoin'];
  
}
echo $m;
$m=$m-$total_coin;
echo $m;
 $_SESSION['max']=$m ;
 //header("Location: entry.php");
 


?> -->