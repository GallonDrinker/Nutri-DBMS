
<?php

$no=$_GET['order_id'];


$db = mysqli_connect("localhost", "root", "", "chill_outs");
$sql="DELETE FROM `entrys` WHERE order_id=$no";
$result=mysqli_query($db,$sql);
header("location: entrylist.php");

?>