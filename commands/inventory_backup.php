<!DOCTYPE html>
<html>
<head>
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

.pirosvonal {
border: 1px solid red;
}

.banner {
left: 50%;
font-family: 'Work Sans';
}

.text {
font-size: 20px;
font-family: 'Work Sans';
padding-top: 2%;
padding-bottom: 2%;
height: 10px;
}

.log {
font-size: 15px;
font-family: 'Work Sans';
padding-top: 2%;
padding-bottom: 2%;
text-align: center;
height: 150px;
width: 75%;
overflow: auto;
display: flex;
flex-direction: column-reverse;
}

.hatter {
background-repeat: no-repeat;
background-position: center;
background-size: cover;
background-color: grey;

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

.fejlec {
position: absolute;
top: 19%;
left: 50%;
transform: translate( -50%, 0);
font-size: 20px;
margin-right: -50%;
display: inline-block;
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


}

.lablec2 {
position: absolute;
left: 50%;
transform: translate( -50%, 0);
font-size: 20px;
font-family: arial;
margin-right: -50%;
bottom: 0;
}

a {
color: white;
text-decoration: none;
}


.button {
font-size: 18px;
width: 40%;
color: white;
background-color: rgba(0, 0, 0, 0.6);
padding: 10px 30px;
display: inline-block;
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

.log {
font-size: 10px;
}

.abovecenter {
position: absolute;
top: 35%;
width:100%
}

.weatherwidget-io {
font-size: 12px;
width: 100%;
	
}

.text {
font-size: 16px;	
}

}
@media only screen and (max-width: 480px) {
/* Add your custom styles here for smaller Mobile */
}

</style>

</head>
<body class="hatter" text="#FFFFFF" onload="updateClock(); setInterval('updateClock()', 1000 )">



	<table  class="text" align="center">
		<thead>
			<tr>
				<th>ID</th>
				<th>Típus</th>
				<th>Megnevezés</th>
				<th>Méret</th>
				<th>Leírás</th>
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
				$sql = "SELECT ITEM.id, ITEM_TYPE.Tipus, ITEM.Megnev, ITEM.Meret, ITEM.leiras, CONTACT.Nev, CASE WHEN ITEM.Kolcson = 1 THEN 'igen' ELSE 'nem' END AS Kolcson, ITEM.Datum 
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
	<tr>
				<td align="left" width="33%" valign="top">
			
				</td>
				<td align="center" width="33%" valign="top">
					<form action="http://192.168.0.117:8080/sesame/commands/inventory_add.php" method="get" target="_self">
					<button type="submit" class="button">Új hozzáadása</button>
				</form>
				</td>
				<td align="right" width="33%" valign="top">
					
				</td>
			</tr>
	</table>
</div>




</body>
</html>
