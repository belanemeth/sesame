<!DOCTYPE html>
<html>
<head>
	<title>Babacuccok</title>
</head>
<body>
	<h1>Baba holmi hozzáadása</h1>
	<form method="POST" enctype="multipart/form-data">
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

				// Ellenőrizzük a kapcsolatot
			if ($conn->connect_error) {
				die("Kapcsolódási hiba: " . $conn->connect_error);
			}

			// Lekérdezzük a kontaktokat
			$sql = "SELECT id, Nev FROM CONTACT";
			$result = $conn->query($sql);

			// Legördülő menü feltöltése a lekérdezett adatokkal
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					echo "<option value=\"" . $row["id"] . "\">" . $row["Nev"] . "</option>";
				}
			}

			// Bezárjuk az adatbázis kapcsolatot
			$conn->close();
		?>
	</select><br><br>
	<label for="kolcson">Kölcsön?</label>
	<input type="checkbox" name="kolcson" <?php if (isset($_POST['kolcson'])) echo "checked='checked'"; ?> value="1"><br>
	
	
	<label for="datum">Dátum:</label>
	<input type="date" id="datum" name="datum" value="<?php echo date('Y-m-d'); ?>" required>
	
	<label for="picture">Kép feltöltése:</label>
    <input type="file" name="picture" id="picture"><br><br>
	
	<input type="submit" name="submit" value="Hozzáadás">
	</form>

	<?php
		// Adatbázis kapcsolódás
		$servername = "localhost";
		$root = "root";
		$password = "Password.1";
		$dbname = "Babacuccok";

		$conn = mysqli_connect($servername, $root, $password, $dbname);


		// kép beszúrása a PICTURES táblába
if (!empty($_FILES['kep']['name'])) {
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["kep"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Ellenőrizze, hogy a kép valódi-e
$check = getimagesize($_FILES["kep"]["tmp_name"]);
if($check !== false) {
$uploadOk = 1;
} else {
echo "Hiba: A feltöltött fájl nem kép.";
$uploadOk = 0;
}

// Ellenőrizze a fájl méretét
if ($_FILES["kep"]["size"] > 500000) {
echo "Hiba: A kép mérete túl nagy.";
$uploadOk = 0;
}

// Engedélyezze csak a bizonyos képformátumokat
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
echo "Hiba: Csak JPG, JPEG, PNG és GIF formátumú fájlok engedélyezettek.";
$uploadOk = 0;
}

// Ellenőrizze, hogy az $uploadOk értéke 0-e
if ($uploadOk == 0) {
echo "Hiba: A kép nem került feltöltésre.";
// Ha minden rendben, akkor feltöltjük a képet
} else {
if (move_uploaded_file($_FILES["kep"]["tmp_name"], $target_file)) {
// kép beszúrása a PICTURES táblába
$picture_query = "INSERT INTO PICTURES (Fajlnev, Tipus, Meret) VALUES ('".basename($_FILES["kep"]["name"])."','".$_FILES["kep"]["type"]."','".$_FILES["kep"]["size"]."')";
if ($conn->query($picture_query) === TRUE) {
$PICTURE_ID = $conn->insert_id;
} else {
echo "Hiba: " . $picture_query . "<br>" . $conn->error;
}
} else {
echo "Hiba: A kép feltöltése nem sikerült.";
}
}
}

// kapcsoló rekord beszúrása az ITEM_PICTURES táblába
if (!empty($PICTURE_ID)) {
$item_picture_query = "INSERT INTO ITEM_PICTURES (ITEM_ID, PICTURE_ID) VALUES ('".$ITEM_ID."','".$PICTURE_ID."')";
if ($conn->query($item_picture_query) !== TRUE) {
echo "Hiba: " . $item_picture_query . "<br>" . $conn->error;
}
}








		// Űrlap elküldésekor az adatok mentése az ITEM táblába
		if(isset($_POST['submit'])) {
			$megnev = $_POST['megnev'];
			$meret = $_POST['meret'];
			$hiba = $_POST['hiba'];
			$kitol = $_POST['kitol'];
			$kolcson = isset($_POST['kolcson']) ? 1 : 0;
			$datum = $_POST['datum'];

			$sql = "INSERT INTO ITEM (Megnev, Meret, Hiba, Kitol, kolcson, datum) VALUES ('$megnev', '$meret', '$hiba', '$kitol', '$kolcson', '$datum')";

			if (mysqli_query($conn, $sql)) {
				echo "<p>Az adatok sikeresen hozzáadva az ITEM táblához.</p>";
			} else {
				echo "Hiba: " . $sql . "<br>" . mysqli_error($conn);
			}
		}

		mysqli_close($conn);
	?>
	
	
	
	
	
	
	<table>
		<thead>
			<tr>
				<th>ID</th>
				<th>Megnevezés</th>
				<th>Méret</th>
				<th>Hiba</th>
				<th>Kitől</th>
				<th>Kölcsön?</th>
				<th>Dátum</th>
			</tr>
		</thead>
		<tbody>
			<?php
				// Kapcsolódás az adatbázishoz
				$conn = mysqli_connect('localhost', 'root', 'Password.1', 'Babacuccok');

				// Ellenőrizzük a kapcsolatot
				if (!$conn) {
					die("Kapcsolódási hiba: " . mysqli_connect_error());
				}

				// Lekérdezzük az ITEM tábla összes rekordját
				$sql = "SELECT ITEM.id, ITEM.Megnev, ITEM.Meret, ITEM.Hiba, CONTACT.Nev, CASE WHEN ITEM.Kolcson = 1 THEN 'igen' ELSE 'nem' END AS Kolcson, ITEM.Datum FROM ITEM LEFT JOIN CONTACT ON ITEM.Kitol=CONTACT.id";
				$result = mysqli_query($conn, $sql);

				// Ellenőrizzük, hogy van-e eredmény
				if (mysqli_num_rows($result) > 0) {
					// Kiírjuk az eredményeket
					while($row = mysqli_fetch_assoc($result)) {
						echo "<tr>";
						echo "<td>" . $row["id"] . "</td>";
						echo "<td>" . $row["Megnev"] . "</td>";
						echo "<td>" . $row["Meret"] . "</td>";
						echo "<td>" . $row["Hiba"] . "</td>";
						echo "<td>" . $row["Nev"] . "</td>";
						echo "<td>" . $row["Kolcson"] . "</td>";
						echo "<td>" . $row["Datum"] . "</td>";
						echo "</tr>";
					}
				} else {
					echo "Nincs egyetlen rekord sem az adatbázisban.";
				}

				// Bezárjuk a kapcsolatot
				mysqli_close($conn);
			?>
		</tbody>
	</table>
</body>
</html>
