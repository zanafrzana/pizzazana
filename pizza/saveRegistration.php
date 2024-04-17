<html>
<head>
<title>FarzPizza</title>
</head>
<body>
 <?php

 $date = date("d-m-Y");
 //get input values from form
 extract($_POST);
 ?>
 <p>Date: <b><?php print($date) ?></b></p>
 <h3>RECEIPT</h3>
 <table>

 <tr><td>Name</td>
    <td>:</td>
    <td><b><?php print($adName) ?></b></td>
 </tr>

 <tr><td>No.Phone</td>
    <td>:</td>
    <td><b><?php print($adNoPhone) ?></b></td>
 </tr>

 <tr><td>Email</td>
    <td>:</td>
    <td><b><?php print($adEmail) ?></b></td>
 </tr>

 <tr><td>FoodName1</td>
    <td>:</td>
    <td><b><?php print($FoodName1) ?></b></td>
 </tr>

 <tr><td>FoodName2</td>
 <td>:</td>
 <td><b><?php print($FoodName2) ?></b></td>
 </tr>

 <tr><td>FoodName3</td>
 <td>:</td>
 <td><b><?php print($FoodName3) ?></b></td>
 </tr>

 <tr><td>Price</td>
 <td>:</td>
 <td><b><?php print($adPrice) ?></b></td>
 </tr>


 </table>
 <?php
 $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "farzpizza";

 // Create connection
 $conn = new mysqli($servername, $username, $password, $dbname);

 // Check connection
 if ($conn->connect_error) {
 die("Connection failed: " . $conn->connect_error); }
 //create query
 $sql = "INSERT INTO receipt ( Name, NoPhone, Email, FoodName1, FoodName2, FoodName3,
    Price) VALUES ('$adName', '$adNoPhone', '$adEmail', '$FoodName1', '$FoodName2', '$FoodName3',
   '$adPrice')";

 //execute query
 if($conn->query($sql) === TRUE) {
 echo "New record created successfully";
 }
 else {
 echo "Error: " . $sql . "<br>" . $conn->error;
 }
 //close connection
 $conn->close();
 ?>
 <br>
 <form>
 <input type="button" name="printButton" onClick="window.print()" value="Print">
 </form>
</body>
</html>