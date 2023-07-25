<!DOCTYPE html>
<html>
<head>
<link rel="icon" href="baby_icon.png">
	<title>Babacuccok</title>

	<link rel="stylesheet" href="styles_inv.css">
</head>
<body class="hatter" text="#FFFFFF">



	<table  class="table" align="center">
		<thead>
			<tr>
				<th>ID</th>
				<th>Típus</th>
				<th>Megnevezés</th>
				<th>Méret</th>
				<th>Leírás</th>
				<th>Kitől</th>
				<th>Kölcsön</th>
				<th>Dátum</th>
				<th>Kép</th>
			</tr>
		</thead>
		<tbody>
			<?php
				require_once '/var/www/html/sesame/commands/dbconfig.php';

				$conn = mysqli_connect($servername, $username, $password, $dbname);

				// Ellenőrizzük a kapcsolatot
				if (!$conn) {
					die("Kapcsolódási hiba: " . mysqli_connect_error());
				}
			
				// Lekérdezzük az ITEM tábla összes rekordját
				$sql = "SELECT ITEM.id, ITEM_TYPE.Tipus, ITEM.Megnev, ITEM.Meret, ITEM.leiras, CONTACT.Nev, CASE WHEN ITEM.Kolcson = 1 THEN 'igen' ELSE 'nem' END AS Kolcson, ITEM.Datum, ITEM.PicturePath
						FROM ITEM 
						LEFT JOIN CONTACT ON ITEM.Kitol=CONTACT.id 
						LEFT JOIN ITEM_TYPE ON ITEM.ItemTypeID = ITEM_TYPE.id";

				$result = mysqli_query($conn, $sql);

				// Ellenőrizzük, hogy van-e eredmény
				if (mysqli_num_rows($result) > 0) {
					// Kiírjuk az eredményeket
					while($row = mysqli_fetch_assoc($result)) {
						echo "<tr>";
						echo "<td>" . $row["id"] . "</td>";
						echo "<td>" . $row["Tipus"] . "</td>";
						echo "<td>" . $row["Megnev"] . "</td>";
						echo "<td>" . $row["Meret"] . "</td>";
						echo "<td>" . $row["leiras"] . "</td>";
						echo "<td>" . $row["Nev"] . "</td>";
						echo "<td>" . $row["Kolcson"] . "</td>";
						echo "<td>" . $row["Datum"] . "</td>";
						if($row["PicturePath"]) {
						echo '<td><a href="' . $row["PicturePath"] . '">Kép megtekintése</a></td>';
							} else {
						echo "<td>Nincs kép</td>";
									}
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
				


<div>
	<table class="lablec" width="100%">
	<tr class="none">
				<td>
			 
				</td>
				<td>
					
				</form>
				</td>
				<td>
				<p> </p>
				</td>
			</tr>
	<tr class="none">
				<td class="lableccella">
					<form action="http://192.168.0.117:8080/sesame/index.php" method="get" target="_self">
					<button type="submit" class="button">Sesame</button>
					</form>
				</td>
				<td class="lableccella">
				<form action="excel_letoltes.php" method="post">
				<button type="submit" class="button" name="letoltes">Letöltés</button>
				</form>
				</td>
				<td class="lableccella">
					<form action="inventory_add.php" method="get" target="_self">
					<button type="submit" class="button">Hozzáadás</button>
					</form>
				</td>
			</tr>
			
			<tr class="none">
				<td>
			 
				</td>
				<td>
					
				</form>
				</td>
				<td>
				<p> </p>
				</td>
			</tr>
	</table>
</div>




</body>
</html>
