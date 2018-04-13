<?php
	require '../logic/connection/info.php';
	// '../' is altijd terug naar de root map, als je al in de rootmap bent is dit niet nodig
	// in info.php staan de gegevens van de database en de inglognaam en wachtwoord om erin te komen

		if (!$conn) {
		    die("Connection failed: " . mysqli_connect_error());
		}
		// selecteer het id en de titel uit de tabel 'activiteiten'
	$sql = "SELECT id, omschrijving FROM activiteiten";
	// doe het maken van de connectie en de query die moet worden uitgevoerd in een variable "result"
	$result = mysqli_query($conn, $sql);
	// voer alles uit wat in result zit en stop het in de variable 'todolist'
	$todolist = $result->fetch_all(MYSQLI_ASSOC);
	// stop de connectie, het process is afgerond
	mysqli_close($conn);
?>

<!-- response -->
<html>

<?php 
	if ($result->num_rows > 0) {
?>
	<table>
		<tr>
			<th>ID</th><th>Titel</th>
		</tr>
<?php
	    // voor elk resultaat een row maken
	    foreach($todolist as $row) {
?>
	<tr>
		<!-- hier laat je m echo-en wat je net hebt opgehaald, dit zie je dus ook staan op de pagina -->
		<!-- Haal uit de array 'row' het id en de titel -->
		<td><?php echo $row["id"];?></td>
		<td><?php echo $row["omschrijving"];?></td>

		<td>
			<!-- 'get' request kan je terugvinden in de url ('?id=x' staat er in dit geval achter) -->
			<form method="get" action="updateactiviteitpage.php">
				<input type="hidden" name="id" value="<?php echo $row["id"];?>">
				<button type="submit">Activiteit bewerken</button>
			</form>
		</td>

		<td>
			<!-- 'post'request kan je niet terugvinden in de url en gebeurt zoals jurn zegt onderwhaater. -->
			<form method="post" action="../logic/deleteactiviteit.php">
	    		<input type="hidden" name="id" value="<?php echo $row["id"];?>">
	    		<button type="submit">Activiteit verwijderen</button>
			</form>
		</td>
	</tr>
<?php
	    } // end foreach
?>
	</table>
<?php
	} else { 
?>
	<p>0 results</p>
<?php
	} // end if else
?>
<!-- WOOOOH kom we gaan kijken wat er in activiteitcreatepage.php gebeurd!!! -->
	<form method="get" action="../logic/createactiviteitpage.php">
	   	 <button type="submit">Activiteit Toevoegen</button>
	</form>

	<form method="get" action="../index.php">
	   	 <button type="submit">Terug naar de Homepage</button>
	</form>

	<link rel="stylesheet" href="css/style.css">

</html>
</html>

