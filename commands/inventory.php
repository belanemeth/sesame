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
	height: 85%;
	width: 95%;
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
background-repeat: no-repeat;
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

.button {
font-size: 18px;
width: 40%;
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
font-size: 25px;
width: 70%;
font-family: arial;
color: white;
background-color: rgba(0, 0, 0, 0.7);
padding: 5px 15px;
display: inline-block;
}

.button3 {
font-size: 5px;
width: 70%;
font-family: arial;
color: white;
background-color: rgba(0, 0, 0, 0.7);
padding: 2px 5px;
display: inline-block;
}


.lablec {
left: 50%;
transform: translate( -50%, 0);
font-size: 12px;
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

table {
	font-size: 25px;
	font-family: 'Work Sans';
	text-align: center;
	height: 90%;
	width: 95%;
	border-stye: groove;
	border-color: black;
}

th {
font-size: 28px;	
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
width:100%
}


}
@media only screen and (max-width: 480px) {
/* Add your custom styles here for smaller Mobile */
}

</style>

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
				// Kapcsolódás az adatbázishoz
				$conn = mysqli_connect('localhost', 'root', 'Password.1', 'Babacuccok');

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
					<form action="http://192.168.0.117:8080/sesame/commands/inventory_add.php" method="get" target="_self">
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
