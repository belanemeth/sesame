<?php
shell_exec('sudo copy_db.sh');
shell_exec('sudo copy_pictures.sh');
header('Location: http://192.168.0.117/sesame/index.php?success=true');
?>
