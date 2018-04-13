<!DOCTYPE html>
<html>
	<head>
		<title></title>
	</head>
	<body>
<?php 
	require '../logic/connection/info.php';
	$sql = "SELECT * FROM lijsten";
	$result = mysqli_query($conn, $sql);

if ($result->num_rows > 0) {
    echo "<h3>Selecteer de lijst waarin je je activiteit wilt plaatsen:</h3>
    		<form action='createactiviteit.php' method='post'>
    		<select name='lijsttitel'>";
    		// dit is gewoooon html in een php echotje
		    // output data of each row
		    while($row = $result->fetch_assoc()) {
		        echo "<option value=".$row["titel"].">".$row["titel"]."</option>";
		    }
		    echo "</select>
		    	  <hr style='width:100px; height:2px; background-color:black; left:0; position:absolute; margin-top:10px;'><br><br>";
			} else {
			    echo "0 results";
			}
 ?>
 					<!-- oeh oeh we gaan naar create.php wooh kom we gaan kijken wattie doet -->
					Activiteitsnaam:
						  <!-- hier geven we de input de naam 'titel' zodat we deze later vanuit create.php kunnen ophalen met de post(staatindeform) -->
						  <input type="text" name="activiteitsnaam"><br>
						  <input type="submit" value="Activiteit toevoegen">
						  <hr style='width:100px; height:2px; background-color:black; left:0; position:absolute; margin-top:10px;'>
					</form><br>
					<form method="get" action="../index.php">
					   	 <button type="submit">Terug naar het hoofdmenu</button>
					</form>
	</body>
</html>