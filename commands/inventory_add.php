<!DOCTYPE html>
<html>
<head>
<link rel="icon" href="baby_icon.png">
	<title>Babacuccok</title>
	
	<style>
@import url('https://fonts.googleapis.com/css?family=Work+Sans:300&subset=latin-ext');
html, Body {
Height: 100%;
Margin: 0;
overflow: hidden;
color: white;
font-size: 55px;
font-family: 'Work Sans';
}

table {
	font-size: 20px;
	font-family: 'Work Sans';
	text-align: center;
	width: 60%;
	overflow: auto;
	border: 1px solid black;
  display: flex;
  flex-direction: column;
  border-collapse: collapse;
}

table.other {
	font-size: 20px;
	font-family: 'Work Sans';
	text-align: center;
	width: 40%;
	overflow: auto;
	border: 1px solid black;
	display: flex;
	flex-direction: column;
	border-collapse: collapse;
}

thead {
  display: flex;
  position: sticky;
  top: 0;
  background-color: rgba(0, 0, 0, 0.7);
  flex-direction: column;
  align-items: stretch;
}

tr {
  display: flex;
  flex-direction: row;
  flex: 1;
  border: 1px solid black;
}

tr.none {
 border: none;
}

th {
font-size: 22px;	
flex: 1;
padding: 5px;
text-align: center;
}

td {
  flex: 1;
  padding: 5px;
  text-align: center;
}




.hatter {
background-image: url("wallpaper.png");
background-repeat: repeat;
background-size: cover;
background-blend-mode: darken;

}

.textbox {
width: 50%;
margin: 0 auto;
}

.abovecenter {
position: absolute;
top: 40%;
width:100%
}


.center {
position: absolute;
left: 50%;
transform: translate(-50%, -50%);
margin-right: -50%;
}

.videosize {
width: auto;
height: auto;
min-width: 100%;
min-height: 100%;
position: fixed;
object-fit: fill;
}


.fejlec2 {
position: absolute;
left: 50%;
top: 4%;
transform: translate( -50%, 0);
font-size: 20px;
margin-right: -50%;
}


.lablec {
position: relative;
left: 50%;
transform: translate( -50%, 0);
font-size: 30px;
bottom: 0;
margin-right: -50%;
border: none;
}

.lableccella {
  position: relative;
  bottom: 0px;
  width: 33%;
  height: 80px;
  text-align: center;	
  display: block;
margin: auto;

}
.browse {
font-size: 18px;
}

.button {
font-size: 18px;
color: white;
background-color: rgba(0, 0, 0, 0.6);
padding: 10px 30px;
box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);

}

.button:hover {
  background-color: rgba(0, 0, 0, 1)
 
 }

.button:active{
color: grey;
}

.input {
width: 30%;
}

.font {
font-size: 20px
}

.button2 {
font-size: 14px;
font-family: arial;
color: white;
background-color: rgba(0, 0, 0, 0.6);
}
.button2:hover {
  background-color: rgba(0, 0, 0, 1)
 }

html, body{
      overflow:initial !important;
    }

@media only screen and (max-device-width: 640px) {
/* Add your custom styles here for Mobile */

.button {
font-size: 50px;
font-family: arial;
color: white;
background-color: rgba(0, 0, 0, 0.7);
padding: 5px 15px;
display: inline-block;
}

.browse {
font-size: 50px;
width: 90%;
}

.lablec {
left: 50%;
transform: translate( -50%, 0);
top: 0;
margin-right: -50%;
}


.banner {
font-size: 35px;
font-family: 'Work Sans';
}

.fejlec {
top: 17%;
left: 50%;
transform: translate( -50%, 0);
font-size: 10px;
margin-right: -50%;
display: inline-block;
}

.input {
font-size: 70px;
width: 90%;
}

input[type=checkbox]
{
  transform: scale(5);
  padding: 10px;
}


table {
	width: 60%;
	font-size: 200%;
	}

table.other {
	width: 100%;
	height: 90%;
	font-size: 200%;
	}


tr {
  border: 1px solid black;
}

tr.none {
 border: none;
}

.abovecenter {
position: absolute;
top: 35%;
}


}
@media only screen and (max-width: 480px) {
/* Add your custom styles here for smaller Mobile */
}

</style>

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
				<input class="input" type="text" name="megnev" size="16" autofocus required><br><br>
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
const fileInput = document.getElementById('kep');
const capturedImage = document.getElementById('captured-image');
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
		<tr>
			<td height="25px">
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


if (isset($_POST['submit'])) {
  if (!empty($_FILES["kep"]["name"]) || !empty($_POST['captured-image-data'])) {
	  // Adatbázis kapcsolódás
        $servername = "localhost";
        $username = "root";
        $password = "Password.1";
        $dbname = "Babacuccok";
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        // Ellenőrizzük a kapcsolatot
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
	  // Tallózott kép adatok
			if (!empty($_FILES["kep"]["name"])) {
			$target_dir = "/media/babacuccok/";
			$target_file = $target_dir . basename($_FILES["kep"]["name"]);
			$uploadOk = 1;
			$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

			// Ellenőrizzük, hogy a fájl már létezik-e
			if (file_exists($target_file)) {
				echo "A fájl már létezik.";
				$uploadOk = 0;
			}

			// Ellenőrizzük, hogy a fájl mérete megfelelő-e
			if ($_FILES["kep"]["size"] > 50000000) {
				echo "A fájl túl nagy.";
				$uploadOk = 0;
			}

			// Engedélyezzük csak bizonyos fájltípusokat
			if (!in_array($imageFileType, ["jpg", "png", "jpeg", "gif"])) {
				echo "Csak JPG, JPEG, PNG & GIF fájlok engedélyezettek.";
				$uploadOk = 0;
			}

			// Ellenőrizzük, hogy a fájl valóban kép-e
			$check = getimagesize($_FILES["kep"]["tmp_name"]);
			if ($check === false) {
				echo "A tallózott fájl nem kép.";
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
     

        // Ha kamerával készített kép van a POST-ban
			if (!empty($_POST['captured-image-data'])) {
				$image_data = $_POST['captured-image-data'];
				$file_name = "captured_image_" . date("Ymd_His") . ".jpg"; // Az aktuális dátum és idő hozzáadása a fájlnévhez
				$image_folder = "/media/babacuccok/";
				$uploadOk = 1;
				$file_path = $image_folder . $file_name;

				if (file_put_contents($file_path, $image_data)) {
					// Ellenőrizzük, hogy a fájl valóban kép-e
					$image_type = exif_imagetype($file_path);
					if ($image_type === false) {
						echo "A készített fájl nem kép.";
						$uploadOk = 0;
					} else {
						$picturePath = mysqli_real_escape_string($conn, $file_path);
					}
				} else {
					echo "Hiba történt a fájl mentése során.";
					$uploadOk = 0;
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
            echo "A fájl sikeresen feltöltve és az adatok rögzítése megtörtént!";
            // header('Location: inventory.php');
            mysqli_close($conn);
        } else {
            echo "Hiba: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}
}
}	
	//Ha nincs képünk
	else {
// Adatbázis kapcsolódás
		$servername = "localhost";
		$username = "root";
		$password = "Password.1";
		$dbname = "Babacuccok";

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
            echo "Az adatok rögzítése megtörtént!";
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
	</tbody>
</table>

<div>
	<table class="lablec">
			<tr class="none">
				<td>
			 
				</td>
				<td>
				</td>
				<td>
				<p> </p>
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
