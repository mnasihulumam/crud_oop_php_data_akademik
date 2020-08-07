<?php
session_start();
unset($_SESSION['user_aktiv']);
session_destroy();

echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php">';
?>