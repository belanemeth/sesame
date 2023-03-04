<?php
shell_exec("systemctl restart nagios");
header('Location: http://192.168.0.117/sesame/index.php?success=true');
?>