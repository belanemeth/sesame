<?php
shell_exec('sudo pibackup.sh');
header('Location: http://192.168.0.117/sesame/index.php?success=true');
?>
