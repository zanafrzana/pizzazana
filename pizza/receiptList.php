<html>
<head>
 <title>FarzPizza</title>
</head>
<body>
 <h3 align="center">RECEIPT LIST FARZ PIZZA</h3>
<?php
 $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "FarzPizza";
 // Create connection
 $conn = new mysqli($servername, $username, $password, $dbname);
 // Check connection
 if ($conn->connect_error) {
 die("Connection failed: " . $conn->connect_error);
 }
 //create and execute query
 $sql = "SELECT * FROM receipt";
 $result = $conn->query($sql);
 //check if records were returned
 if ($result->num_rows > 0) {
 //create a table to display the record
 echo '<table cellpadding=10 cellspacing=0 border=1 align="center">';
 echo '<tr><td align="center"><b>No</b></td>
 <td align="center"><b>Customer Name</b></td>
 <td align="center"><b>No.Phone</b></td>
 <td align="center"><b>Email</b></td>
 <td align="center"><b>FoodName1</b></td>
 <td align="center"><b>FoodName2</b></td>
 <td align="center"><b>FoodName3</b></td>
 <td align="center"><b>Price</b></td>
 </tr>';

 // output data of each row
 while($row = $result->fetch_assoc()) {
 echo '<tr>';
 echo '<td align="center">'.$row["Bil"].'</td>';
 echo '<td align="center">'.$row["Name"].'</td>';
 echo '<td align="center">'.$row["NoPhone"].'</td>';
 echo '<td align="center">'.$row["Email"].'</td>';
 echo '<td align="center">'.$row["FoodName1"].'</td>';
 echo '<td align="center">'.$row["FoodName2"].'</td>';
 echo '<td align="center">'.$row["FoodName3"].'</td>';
 echo '<td align="center">'.$row["Price"].'</td>';
 echo '</tr>';
 }
 }
 else {
 echo "0 results"; //if no record found in the database
 }
 //close connection
 $conn->close();
 echo '<p><a href="adminMenu.php">Back to Main Menu</a></p>';
?>
</body>
</html>