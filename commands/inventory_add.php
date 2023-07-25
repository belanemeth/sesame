<!DOCTYPE html>
<html>
<head>
<link rel="icon" href="baby_icon.png">
	<title>Babacuccok</title>
	
	<link rel="stylesheet" href="styles_add.css">
</head>
<body class="hatter" text="#FFFFFF">

<table  class="other" align="center">
	<thead>
		<tr>
			<th colspan="3" align="center" valign="top">
				<div class="banner">Baba holmi hozzáadása </div>
			</th>
		</tr>
	</thead>
	<tbody>

	<tr>
			<td>
				<div>
				<form enctype="multipart/form-data" method="POST">
					<label for="tipus">Típus:</label>
					<select class="input" name="tipus">
			<?php
				require_once 'dbconfig.php';
				$conn = mysqli_connect($servername, $username, $password, $dbname);

				// Ellenőrizzük a kapcsolatot
				if ($conn->connect_error) {
				die("Kapcsolódási hiba: " . $conn->connect_error);}

			// Lekérdezzük a tipusokat
			$sql = "SELECT id, Tipus FROM ITEM_TYPE
					ORDER BY Tipus ASC";
			$result = $conn->query($sql);

			// Legördülő menü feltöltése a lekérdezett adatokkal
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					echo "<option value=\"" . $row["id"] . "\">" . $row["Tipus"] . "</option>";
				}
			}

			// Bezárjuk az adatbázis kapcsolatot
			mysqli_close($conn);
			?>

			</select><br><br>
			</div>
		</td>
	</tr>

		<tr>
			<td>
				<label for="megnev">Megnevezés:</label>
				<input class="input" type="text" name="megnev" id ="megnev" size="25" autofocus required><br><br>
			</td>	
		</tr>
		<tr>
			<td>
				<label for="meret">Méret:</label>
				<input class="input" type="text" name="meret" pattern="^(0|[1-9]\d?|1\d{2}|200)(-?(0|[1-9]\d?|1\d{2}|200))?$" title="Például: 64-172" required>
			</td>	
		</tr>
		<tr>
			<td>
				<label for="leiras">Leírás:</label>
				<textarea class="input" name="leiras"></textarea><br><br>
			</td>	
		</tr>
		<tr>
			<td>
				<label for="kitol">Kitől:</label>
		<select class="input" name="kitol">
			<?php
				// Adatbázis kapcsolódás
				require_once 'dbconfig.php';
				$conn = mysqli_connect($servername, $username, $password, $dbname);

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
			mysqli_close($conn);
			?>
			</select><br><br>
			</td>	
		</tr>
		<tr>
			<td>
				<label for="kolcson">Kölcsön?</label>
				<input type="checkbox" class="input" name="kolcson" <?php if (isset($_POST['kolcson'])) echo "checked='checked'"; ?> value="1" checked><br>
			</td>	
		</tr>
		<tr>
			<td>
				<label for="datum">Dátum:</label>
				<input type="date" class="input" id="datum" name="datum" value="<?php echo date('Y-m-d'); ?>" required>
			</td>	
		</tr>
		<tr>
			<td>
				<input name="kep" id="kep" class="browse" type="file" accept="image/*">
				<input type="hidden" name="captured-image-data" id="captured-image-data">
				<input type="hidden" name="captured-image-name" id="captured-image-name">

				<script>
					// képmentéshez változók
				const fileInput = document.getElementById('kep');
				const capturedImage = document.getElementById('captured-image-data');
				const capturedImageData = document.getElementById('captured-image-data');

				if (fileInput.files.length > 0) {
				  var file = fileInput.files[0];
				  var reader = new FileReader();

				  reader.onload = function(event) {
					var imageData = event.target.result;
					var imageName = file.name;
					capturedImage.src = imageData; // Az elkészített kép megjelenítése, ha szükséges
					capturedImageData.value = imageData;
					document.getElementById("captured-image-name").value = imageName;
				  };

				  reader.readAsDataURL(file);
				}
				</script>



			</td>
		</tr>
		<tr>			
			<td>
				<input class="button" class="input" type="submit" name="submit" value="Hozzáadás">
			</td>	
		</tr>
	</tbody>
</table>

<div>
	<table class="lablec">
	
			<tr class="none">
				<td class="lablec_echo">
				<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


if (isset($_POST['submit'])) {
  if (!empty($_FILES["kep"]["name"]) || !empty($_POST['captured-image-data'])) {
	  // Adatbázis kapcsolódás
	  	require_once 'dbconfig.php';
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        // Ellenőrizzük a kapcsolatot
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
	  // kép adatok
			if (!empty($_FILES["kep"]["name"])) {
				$target_dir = "/media/babacuccok/";
				$uploadOk = 1;
				$original_filename = $_POST['megnev']; // Az eredeti képnév a "megnev" formból
				$original_filename = transliterator_transliterate('Any-Latin; Latin-ASCII;', $original_filename); // Ékezetes karakterek cseréje
				$original_filename = str_replace(' ', '_', $original_filename); // Szóköz helyett alulvonás
				$original_filename = preg_replace('/[^a-zA-Z0-9\s]/u', '', $original_filename); // csak az angol betűket, számokat és szóközöket tartjuk meg

				$extension = strtolower(pathinfo($_FILES["kep"]["name"], PATHINFO_EXTENSION));
				$datetime = date("Ymd_His");
				$new_filename = $original_filename . '_' . $datetime . '.' . $extension;
				$target_file = $target_dir . $new_filename;
				
				// Ellenőrizzük, hogy a fájl már létezik-e  - felesleges function, minden kép egyedi nevet kap
	//				if (file_exists($target_file)) {
	//				echo "A fájl már létezik.";
	//				$uploadOk = 0;
	//			}

				// Ellenőrizzük, hogy a fájl mérete megfelelő-e
				if ($_FILES["kep"]["size"] > 50000000) {
					echo "A fájl túl nagy.";
					$uploadOk = 0;
				}

				// Engedélyezzünk csak bizonyos fájltípusokat
				if (!in_array($extension, ["jpg", "png", "jpeg", "gif"])) {
					echo "Csak JPG, JPEG, PNG & GIF fájlok engedélyezettek.";
					$uploadOk = 0;
				}

				// Ellenőrizzük, hogy a fájl valóban kép-e // működik ez?
				$check = getimagesize($_FILES["kep"]["tmp_name"]);
				if ($check === false) {
					echo "A fájl nem kép.";
					$uploadOk = 0;
				}

				// Ha minden ellenőrzés sikeres volt, akkor mozgatjuk át a fájlt az új helyére
				if ($uploadOk === 1) {
					if (move_uploaded_file($_FILES["kep"]["tmp_name"], $target_file)) {
						// Sikeres mentés, folytathatjuk a többi művelettel
						$picturePath = mysqli_real_escape_string($conn, $target_file);
					} else {
						echo "Hiba a fájl feltöltése közben.";
					}
				}
			}


      	
	// Űrlap elküldésekor az adatok mentése az ITEM táblába

if (isset($_POST['submit'])) {
    $tipus = $_POST['tipus'];
    $megnev = $_POST['megnev'];
    $meret = $_POST['meret'];
    $leiras = $_POST['leiras'];
    $kitol = $_POST['kitol'];
    $kolcson = isset($_POST['kolcson']) ? 1 : 0;
    $datum = $_POST['datum'];
    if ($uploadOk == 1) {
        $picturePath = mysqli_real_escape_string($conn, $target_file);
        $sql = "INSERT INTO ITEM (ItemTypeID, Megnev, Meret, leiras, Kitol, kolcson, datum, PicturePath) VALUES ('$tipus', '$megnev', '$meret', '$leiras', '$kitol', '$kolcson', '$datum', '$picturePath')";
        if (mysqli_query($conn, $sql)) {
            shell_exec('baby.sh');
            echo "" . $megnev . " hozzáadva és a kép feltöltve!";
            // header('Location: inventory.php'); // nem lehet escapelni mert van kitöltött form, todo
            mysqli_close($conn);
        } else {
            echo "Hiba: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}
}
	
	//Ha nincs képünk de van adatunk
	else {
// Adatbázis kapcsolódás
		require_once 'dbconfig.php';
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		// Ellenőrizzük a kapcsolatot
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
		// Űrlap elküldésekor az adatok mentése az ITEM táblába
			$tipus = $_POST['tipus'];
			$megnev = $_POST['megnev'];
			$meret = $_POST['meret'];
			$leiras = $_POST['leiras'];
			$kitol = $_POST['kitol'];
			$kolcson = isset($_POST['kolcson']) ? 1 : 0;
			$datum = $_POST['datum'];
					$sql = "INSERT INTO ITEM (ItemTypeID, Megnev, Meret, leiras, Kitol, kolcson, datum, PicturePath) VALUES ('$tipus', '$megnev', '$meret', '$leiras', '$kitol', '$kolcson', '$datum', NULL)";
					if (mysqli_query($conn, $sql)) {
						shell_exec('baby.sh');
						echo "" . $megnev . " hozzáadva!";
						// header('Location: inventory.php');
						mysqli_close($conn);
					} else {
						echo "Hiba: " . $sql . "<br>" . mysqli_error($conn);
					} 

}			
}
?>
			
			</form>				
				</td>
			</tr>
			<tr class="none">
				<td class="lableccella">
				 </td>
				<td class="lableccella">
					<form action="inventory.php" method="get" target="_self">
					<button type="submit" class="button">Inventory</button>
				</form>
				</td>
				<td class="lableccella">
			 </td>
			</tr>
	</table>
</div>

</body>
</html>
