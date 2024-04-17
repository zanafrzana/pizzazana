<?php
 $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "farzpizza";
 // Create connection
 $conn = new mysqli($servername, $username, $password, $dbname);
 // Check connection
 if ($conn->connect_error) {
 die("Connection failed: " . $conn->connect_error);
 }

 //escape special characters in a string
 $advisor = mysqli_real_escape_string($conn, $_POST['Name']);
 //create and execute query
 $sql = "SELECT * FROM receipt WHERE Name= '$advisor'";
 $result = $conn->query($sql);
 //check if records were returned
 if ($result->num_rows > 0) {
 //create a table to display the record
 echo 'Selected record as the following: <br><br>';
 echo '<p><table cellpadding=10 cellspacing=0 border=1 align="center">';
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
 echo "<td align='center'><a href='updateRecord.php?pid=$row[Name]'> UPDATE </a>
 </td>";
 echo '</tr>';
 }
 echo '</table></p>';
 }
 else {
 echo '<font color=red>No record found';
 }
 //close connection
 $conn->close();
?>
