<?php
session_start();
// Unset все переменные сессии.
session_unset();
// Наконец, разрушить сессию.
session_destroy();
header('Location:/eco_hotel-master/index.php');
?>
