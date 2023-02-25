<!DOCTYPE html>

<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1" /> 
<meta http-equiv="Content-Type" content="text/html; charset=utf8 /">
		<meta name="Language" content="hu">
		<script type="text/javascript" language="JavaScript" src="commands/footer.js"></script>
		<meta http-equiv="refresh" content="60;url=index.php">
		
<link rel="icon" href="favicon.png">
<title> sesame </title>

<script type="text/javascript">

</script>




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
font-size: 55px;
font-family: 'Work Sans';
}

.text {
font-size: 20px;
font-family: 'Work Sans';
padding-top: 2%;
padding-bottom: 2%;
height: 10px;
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
top: 30%;
width:100%

}

.center {
position: absolute;
top: 55%;
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
position: absolute;
left: 50%;
transform: translate( -50%, 0);
font-size: 30px;
top: 0;
margin-right: -50%;
background-color: rgba(0, 0, 0, 0.7);

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

@media only screen and (max-width: 640px) {
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

.abovecenter {
position: absolute;
top: 40%;
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


<video class="center videosize" autoplay loop muted>
<source src=video.mp4 type="video/mp4">
</video>

<div>
<div>
	<table class="lablec" width="100%">
	<tr>
				<td align="left" width="33%" valign="top">
					<font><script language="JavaScript"> kiirdatum();</script></font>
				</td>
				<td align="center" width="33%" valign="top">
					<font><script language="JavaScript"> kiirnevnap();</script></font>
				</td>
				<td align="right" width="33%" valign="top">
					<font><span id="clock">&nbsp;</span></font>
				</td>
			</tr>
	</table>
</div>


<table class= "fejlec2" width="100%">
	<tr>
		<td align="left" width="33%" valign="top">
		</td>
		<td align="center" width="33%" valign="top">
			<a class="weatherwidget-io" href="https://forecast7.com/en/47d5019d04/budapest/" data-label_1="BUDAPEST" data-label_2="WEATHER" data-icons="Climacons" data-mode="Current" data-days="3" data-textcolor="#FFFFFF" >BUDAPEST WEATHER</a>
					<script>
						!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src='https://weatherwidget.io/js/widget.min.js';fjs.parentNode.insertBefore(js,fjs);}}(document,'script','weatherwidget-io-js');
					</script>			
		<div class="text">
			 _________________________________
		</div>
		</td>
		<td align="right" width="33%" valign="top">
		</td>
	</tr>
	<tr align="center">
	<td>
	</td>
		<td>
			<div class="text"><?php
				$TSTAMP = date('Y-m-d h:i');
				$device1 = shell_exec("ping -c 1 192.168.0.102 | grep packet | awk '{ print $6 \" \" $7 \" \" $8 }'");
				$word = "error";
				echo "BELA-SERVER: ${device1}<br />";
				echo "Last Update ${TSTAMP}<br />";
				
				if(strpos($device1, $word) !== false){
				echo "The server is offline!";
				} else{
				echo "The server is online!";	
				}?>
			</div>
				
		</td>
	</tr>	
<!--	
	<tr align="center">
		<td>
		</td>
		<td>
					<form action="http://www.google.com/search" class="searchform" method="get" name="searchform" target="_blank">
							<input autocomplete="on" class="form-controls search" name="q" placeholder="Google-search..." required="required"  type="text">
						<button class="button2" type="submit">Go!</button>
					</form>
		</td>
	</tr>	
-->	
</table>
</div>

<div class="abovecenter">
<table align="center">
	<thead>
		<tr>
			<th colspan="3" align="center" valign="top">
				<div class="banner">What do you want to do?
				</div>
			</th>
		</tr>
	</thead>
	<tbody>

		<tr>
			<td align="center" valign="bottom">
				<div class="text">Apps
			</div>
			</td>
		</tr>

		<tr>
			<td align="center" valign="top">
				<form action="http://192.168.0.117/admin/index.php" method="get" target="_blank">
					<button type="submit" class="button">Pi-hole</button>
				</form>
			</td>	
		</tr>
		<tr>
			<td align="center" valign="top">
				<form action="http://192.168.0.117/nagios/" method="get" target="_blank">
					<button type="submit" class="button">Nagios</button>
				</form>
			</td>
		</tr>
		<tr>
			<td align="center" valign="top">
				<form action="http://192.168.0.102:32400/web/index.html" method="get" target="_blank">
					<button type="submit" class="button">Plex</button>
				</form>
			</td>
		</tr>
		<tr>
			<td align="center" valign="top">
				<form action="http://192.168.0.102:8080/" method="get" target="_blank">
					<button type="submit" class="button">qBittorrent</button>
				</form>
			</td>
		</tr>
		<tr>

			<td align="center" valign="bottom">
				<div class="text">Commands
				</div>
			</td>	

		</tr>
		<tr>
			<td align="center" valign="top">
				<form action="/sesame/commands/wol.php">
						<input class="button" type="submit" value="Turn on server">
				</form>
			</td>
		</tr>
		<tr>
			<td align="center" valign="top">
				<form action="/sesame/commands/shutdown.php">
						<input class="button" type="submit" value="Shutdown server">
				</form>
			</td>
				
		</tr>
		<tr>			
			<td align="center" valign="top">
				<form action="/sesame/commands/backup.php">
						<input class="button" type="submit" value="Backup raspberry">
				</form>
			</td>
		</tr>
		<tr>
			<td align="center" valign="top">
				<form action="/sesame/commands/nagios_restart.php">
						<input class="button" type="submit" value="Restart nagios">
				</form>
			</td>
		</tr>
		<tr>
			<td align="center" valign="top">
				<div class="text">
			 ___________________________________________
			</div>
			</td>
		</tr>
	</tbody>
	
</table>
</div>

</body>

</html>