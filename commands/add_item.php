<!DOCTYPE html>
<html>
<head>
	<title>Adatok hozzáadása az ITEM táblához</title>
</head>
<body>
	<h1>Adatok hozzáadása az ITEM táblához</h1>
	<form method="POST">
		<label for="megnev">Megnevezés:</label>
		<input type="text" name="megnev" required><br><br>

		<label for="meret">Méret:</label>
		<input type="number" name="meret" required><br><br>

		<label for="hiba">Hiba:</label>
		<textarea name="hiba"></textarea><br><br>

		<label for="kitol">Kitől:</label>
		<select name="kitol">
			<?php
				// Adatbázis kapcsolódás
				$servername = "localhost";
				$root = "root";
				$password = "Password.1";
				$dbname = "Babacuccok";

				$conn = mysqli_connect($servername, $root, $password, $dbname);

				// CONTACTS tábla lekérdezése
				$sql = "SELECT id, Nev FROM CONTACTS";
				$result = mysqli_query($conn, $sql);

				// Legördülő menü feltöltése a CONTACTS táblából származó adatokkal
				if (mysqli_num_rows($result) > 0) {
					while($row = mysqli_fetch_assoc($result)) {
						echo "<option value='" . $row["id"] . "'>" . $row["Nev"] . "</option>";
					}
				}
			?>
		</select><br><br>

		<input type="submit" name="submit" value="Hozzáadás">
	</form>

	<?php
		// Adatbázis kapcsolódás
		$servername = "localhost";
		$root = "root";
		$password = "Password.1";
		$dbname = "Babacuccok";

		$conn = mysqli_connect($servername, $root, $password, $dbname);

		// Űrlap elküldésekor az adatok mentése az ITEM táblába
		if(isset($_POST['submit'])) {
			$megnev = $_POST['megnev'];
			$meret = $_POST['meret'];
			$hiba = $_POST['hiba'];
			$kitol = $_POST['kitol'];

			$sql = "INSERT INTO ITEM (Megnev, Meret, Hiba, Kitol) VALUES ('$megnev', '$meret', '$hiba', '$kitol')";

			if (mysqli_query($conn, $sql)) {
				echo "<p>Az adatok sikeresen hozzáadva az ITEM táblához.</p>";
			} else {
				echo "Hiba: " . $sql . "<br>" . mysqli_error($conn);
			}
		}

		mysqli_close($conn);
	?>
</body>
</html>
