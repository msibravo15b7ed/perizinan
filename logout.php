<?php
session_start();
session_destroy();
header("Location: login.html"); // Redirect ke halaman login
exit();
?>
