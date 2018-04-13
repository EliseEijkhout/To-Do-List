	<?php 
		$id = $_GET['id'];
		require '../logic/connection/info.php';

			if (!$conn) {
			    die("Connection failed: " . mysqli_connect_error());
			}
			// dit is ALLEEN het laten zien, niet het updaten, dit gebeurd in update.php
		$sql = "SELECT id, omschrijving FROM activiteiten WHERE id = $id";
		$result = mysqli_query($conn, $sql);
		$todoitem = $result->fetch_assoc();
		mysqli_close($conn);
		echo $todoitem['omschrijving'];
	?>

<!DOCTYPE html>
<html>
<head>
	<title>Update Activiteit</title>
</head>
<body>
	<!-- als je deze form submit ga je dus naar update.php -->
	<form method="post" action="updateactiviteit.php">
	  Titel:<br>
	  <!-- je geeft de input de value(inhoud) van de titel van het id waarop je hebt geklikt -->
	  <input type="text" name="omschrijving" value="<?php echo $todoitem['omschrijving']; ?>">
	  <input type="hidden" name="id" value="<?php echo $todoitem['id']; ?>">
	  <input type="submit" value="Omschrijving bijwerken">

	</form><br>
		<!-- ik kon ook gewoon een button maken met een hrefje naar '../index.php volgensmij lol' -->
		<form method="get" action="../index.php">
				<button type="submit">Terug naar het hoofdmenu</button>
		</form>

</body>
</html>