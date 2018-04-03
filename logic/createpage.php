<!DOCTYPE html>
<html>
	<head>
		<title></title>
	</head>
	<body>
	<?php 
	require '../logic/connection/info.php';
	$sql = "SELECT id, titel FROM lijsten";
$result = mysqli_query($conn, $sql);

if ($result->num_rows > 0) {
    echo "<table>
    		<tr>
	    		<th>ID</th>
	    		<th>Titel</th>
    		</tr>";
    		// dit is gewoooon html in een php echotje
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["id"]."</td><td>".$row["titel"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
 ?>
 					<!-- oeh oeh we gaan naar create.php wooh kom we gaan kijken wattie doet -->
					 <form action="create.php" method="post">
						  Titel toevoegen:<br>
						  <!-- hier geven we de input de naam 'titel' zodat we deze later vanuit create.php kunnen ophalen met de post(staatindeform) -->
						  <input type="text" name="titel">
						  <input type="submit" value="Lijst toevoegen">
					</form>
					<form method="get" action="../index.php">
					   	 <button type="submit">Terug naar het hoofdmenu</button>
					</form>
	</body>
</html>