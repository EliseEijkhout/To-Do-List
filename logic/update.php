<?php 
	require '../logic/connection/info.php';
	$id = $_POST['id'];
	$text = $_POST['titel'];
	if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
	}

	$sql = "UPDATE lijsten SET titel='$text' WHERE id = $id";

	if (mysqli_query($conn, $sql)) {
	    header('Location: update.php');
	} else {
	    echo "Error updating record: " . mysqli_error($conn);
	}
	mysqli_close($conn);
	header('Location: ../index.php');
 ?>