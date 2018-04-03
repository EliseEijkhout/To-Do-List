<?php 
	$id = $_GET['id'];
	require '../logic/connection/info.php';
	// pak met de post alles uit titel (input name="titel" in createpage.php, en zet het in $text)
	// als de connectie niet gemaakt kan worden om welke reden dan ook, geef een error
	if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
	}
	// voeg in tabel activiteiten >(tabel) titel de value $text toe waarin dus alle getypte info staat uit de input
	$sql = "SELECT omschrijving 
			FROM activiteiten 
			LEFT JOIN lijsten
			WHERE activiteiten.omschrijving=lijsten.titel
			";

	$result = mysqli_query($conn, $sql);
	// voer alles uit wat in result zit en stop het in de variable 'todolist'
	$todolist = $result->fetch_all(MYSQLI_ASSOC);
	// als de sql is uitgevoerd en de connectie goed was, ga terug naar createpage.php
	if (mysqli_query($conn, $sql)) {
	    header('Location: ../index.php');
	} else {
 ?>
<!DOCTYPE html>
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
		<td><?php echo $todolist;?></td>
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
</html>