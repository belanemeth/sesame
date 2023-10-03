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

<link rel="stylesheet" href="styles.css">

</head>

<body class="hatter" text="#FFFFFF" onload="updateClock(); setInterval('updateClock()', 1000 )">


<video class="center videosize" autoplay loop muted>
<source src=video.mp4 type="video/mp4">
</video>

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



<div>
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
	<td align="left" width="33%" valign="top">
				
		</td>
		<td>
			<div class="text">
			<?php
					echo nl2br(file_get_contents( "/var/log/sesame/ping.log" )); 
			?>
		</td>
		<td align="right" width="33%" valign="top">
				
		</td>
	
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
				<form action="http://192.168.0.117:3000" method="get" target="_self">
					<button type="submit" class="button">Grafana</button>
				</form>
			</td>	
		</tr>
		
		<tr>
			<td align="center" valign="top">
				<form action="http://192.168.0.117/admin/index.php" method="get" target="_self">
					<button type="submit" class="button">Pi-hole</button>
				</form>
			</td>	
		</tr>
		<tr>
			<td align="center" valign="top">
				<form action="http://192.168.0.117:8080/nagios/" method="get" target="_self">
					<button type="submit" class="button">Nagios</button>
				</form>
			</td>
		</tr>
		<tr>
			<td align="center" valign="top">
				<form action="http://192.168.0.117:9090/" method="get" target="_self">
					<button type="submit" class="button">Prometheus</button>
				</form>
			</td>
		</tr>
		<tr>
			<td align="center" valign="top">
				<form action="http://192.168.0.102:32400/web/index.html" method="get" target="_self">
					<button type="submit" class="button">Plex</button>
				</form>
			</td>
		</tr>
		<tr>
			<td align="center" valign="top">
				<form action="http://192.168.0.102:8080" method="get" target="_self">
					<button type="submit" class="button">qBittorrent</button>
				</form>
			</td>
		</tr>
		 <tr>
        	 <td align="center" valign="top">
                                <form action="http://192.168.0.102:61220" method="get" target="_self">
                                        <button type="submit" class="button">Hard Disk Sentinel</button>
                                </form>
               </td>
          </tr>

        	<tr>
                <td align="center" valign="top">
                     <form action="http://192.168.0.117:8080/phpmyadmin" method="get" target="_self">
                          <button type="submit" class="button">PHP My Admin</button>
                     </form>
                </td>
            </tr>
			<tr>
				<td align="center" valign="top">
								<form action="http://192.168.0.117:8080/sesame/commands/inventory.php" method="get" target="_self">
										<button type="submit" class="button">Babacuccok</button>
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
				<form action="/sesame/commands/backup_db_pics.php">
						<input class="button" type="submit" value="Backup db">
				</form>
			</td>
		</tr>
		
		<tr>
			<td align="center" valign="top">
				<form action="/sesame/commands/log_archive.php">
						<input class="button" type="submit" value="Archive logs">
				</form>
			</td>
		</tr>
		<tr>
			<td align="center" valign="top">
				<form action="/sesame/index.php" method="get" target="_self">
						<button type="submit" class="button">Refresh page</button>
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
		<tr>
			<td align="center" valign="top">
				<div class="log">
					<?php
					echo nl2br(file_get_contents( "/var/log/sesame/sesame.log" )); // get the main log file contents, and echo it out.
					?>
				</div>
			</td>
		</tr>
		
	</tbody>
</table>
</div>





</body>

</html>
