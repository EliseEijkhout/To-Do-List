<?php
		require '../logic/connection/info.php';

			if (!$conn) {
			    die("Connection failed: " . mysqli_connect_error());
			}

		$id = $_POST['id'];
		// delete alles van activiteiten waar het id gelijk staat aan het id wat je aangeklikt hebt
		$sql = "DELETE FROM lijsten WHERE id = $id";
		$result = mysqli_query($conn, $sql);
		// stop de sql connectie, het proces is afgerond
		mysqli_close($conn);

		header("location:../index.php");
		?>