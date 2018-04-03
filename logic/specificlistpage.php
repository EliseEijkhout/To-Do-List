	<?php 
		$id = $_GET['id'];
		require '../logic/connection/info.php';

			if (!$conn) {
			    die("Connection failed: " . mysqli_connect_error());
			}
			// dit is ALLEEN het laten zien, niet het updaten, dit gebeurd in update.php
		$sql = "SELECT id, titel FROM lijsten WHERE id = $id";
		$result = mysqli_query($conn, $sql);
		$todoitem = $result->fetch_assoc();
		mysqli_close($conn);
		echo $todoitem['titel'];
	?>

<!DOCTYPE html>
<html>
<head>
	<title>Update</title>
</head>
<body>

<?php 
	require '../logic/connection/info.php';
	$sql = "SELECT omschrijving 
			FROM activiteiten 
			LEFT JOIN lijsten
			ON lijsten.titel=activiteiten.lijst_titel";
			$result = mysqli_query($conn, $sql);
			// voer alles uit wat in result zit en stop het in de variable 'todolist'
			$todolist = $result->fetch_assoc();
			// stop de connectie, het process is afgerond
			mysqli_close($conn);

 	if ($result->num_rows > 0) {
 ?>
 	<table></br></br>

 <?php
 	    // voor elk resultaat een row maken
 	    foreach($todolist as $row) {
 ?>
 	<tr>
 		<!-- hier laat je m echo-en wat je net hebt opgehaald, dit zie je dus ook staan op de pagina -->
 		<!-- Haal uit de array 'row' het id en de titel -->
 		<td>- <?php echo $row;?></td>

 	</tr>
 <?php
 	    } // end foreach
 ?>
 	</br></br>
</table>
 <?php
 	} else { 
 ?>
 	<p>0 results</p>
 <?php
 	} // end if else
 ?>


	<!-- als je deze form submit ga je dus naar update.php -->

		<!-- ik kon ook gewoon een button maken met een hrefje naar '../index.php volgensmij lol' -->
		<form method="get" action="../index.php">
				<button type="submit">Terug naar het hoofdmenu</button>
		</form>

</body>
</html>