<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation Request</title>
</head>
    
    <!--Form to add list starts here-->
    <div class="d-flex justify-content-center" style="margin-left:340px; margin-top:20px;background-color: lightblue ;width:40%"> 
    <form method="POST" action="book.php">
        <table>
             <tr>
                <td>Doctor 1</td>
            </tr>
            <tr>
                <td>Reservation Date</td>
                <td><input type="date" name="res_date"  required placeholder="Type Reservation date here"/></td>
            </tr>
            <tr>
                <td>Reservation Time</td>
                <td><input type="time" name="res_time"required placeholder="Type Reservation Time"></td>
            </tr>
            <tr>
                <td>Number of people</td>
                <td><input type ="text" name="res_people"  required placeholder="Type amount of people"></td>
            </tr>
            <tr>
                <td><input type="submit" name="submit" value="Place request"></td>
                <td><button type="button" class="btn btn-light"><a href="https://goo.gl/maps/iLioEwqpwAEq7rbe9">Route Map</a> </button></td>
            </tr>
        </table>
    </form>
     
     <!--Form to add list ends here-->
     <form method="POST" action="book.php">
        <table>
            <tr>
            <td>Doctor 2</td>
            </tr>

            <tr>
                <td>Reservation Date</td>
                <td><input type="date" name="res_date"  required placeholder="Type Reservation date here"/></td>
            </tr>
            <tr>
                <td>Reservation Time</td>
                <td><input type="time" name="res_time"required placeholder="Type Reservation Time"></td>
            </tr>
            <tr>
                <td>Number of people</td>
                <td><input type ="text" name="res_people"  required placeholder="Type amount of people"></td>
            </tr>
            <tr>
                <td><input type="submit" name="submit" value="Place request"></td>
                <td><button type="button" class="btn btn-light"><a href="https://goo.gl/maps/iLioEwqpwAEq7rbe9">Route Map</a> </button></td>
            </tr>
        </table>
    </form>
     
     <!--Form to add list ends here-->

     <form method="POST" action="book.php">
        <table>
            <tr>
            <td>Doctor 3</td>
            </tr>
            <tr>
                <td>Reservation Date</td>
                <td><input type="date" name="res_date"  required placeholder="Type Reservation date here"/></td>
            </tr>
            <tr>
                <td>Reservation Time</td>
                <td><input type="time" name="res_time"required placeholder="Type Reservation Time"></td>
            </tr>
            <tr>
                <td>Number of people</td>
                <td><input type ="text" name="res_people"  required placeholder="Type amount of people"></td>
            </tr>
            <tr>
                <td><input type="submit" name="submit" value="Place request"></td>
                <td><button type="button" class="btn btn-light"><a href="https://goo.gl/maps/iLioEwqpwAEq7rbe9">Route Map</a> </button></td>
            </tr>
        </table>
    </form>
     
     <!--Form to add list ends here-->

     <form method="POST" action="book.php">
        <table>
            <tr>
            <td>Doctor 4</td>
            </tr>
            <tr>
                <td>Reservation Date</td>
                <td><input type="date" name="res_date"  required placeholder="Type Reservation date here"/></td>
            </tr>
            <tr>
                <td>Reservation Time</td>
                <td><input type="time" name="res_time"required placeholder="Type Reservation Time"></td>
            </tr>
            <tr>
                <td>Number of people</td>
                <td><input type ="text" name="res_people"  required placeholder="Type amount of people"></td>
            </tr>
            <tr>
                <td><input type="submit" name="submit" value="Place request"></td>
                <td><button type="button" class="btn btn-light"><a href="https://goo.gl/maps/iLioEwqpwAEq7rbe9">Route Map</a> </button></td>
            </tr>
        </table>
    </form>
     
     <!--Form to add list ends here-->
     </div>
</body>
</html>


<?php
    session_start();
    if(isset($_POST['submit']))
    {
    //get the values from the form ans save it in the variables
      $res_date = $_POST['res_date'];
      $res_time = $_POST['res_time'];
      $res_people = $_POST['res_people'];
       $res_date;
       $res_time;
       $res_people;
       $customer_id = $_SESSION['id'];
      //connect databa
      
      $servername = "localhost";
      $username = "root";
      $password = "";
      $db_name = "chill_outs";
      
      
      $conn = new mysqli($servername, $username, $password,$db_name);
      
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }
      echo "Thanks for your reservation";
     

      //Check database connected or not
      //check the db is connected or not
      /*if($db_select==true)
      {
          echo "DAtabase selected";
      }
      */
      //Sql Query to insert into thje db
      $sql = "INSERT INTO reservation (res_date, res_time, res_people,customer_id)VALUES ('$res_date', '$res_time', $res_people,$customer_id)";

      //Execute Query And insert into the db
      $rs = $conn-> query($sql);
      //Query ok or not
      
    }
?>



