<?php
session_start();
session_destroy();
session_start();
// Simpan pesan sukses di session
$_SESSION['success'] = "Anda berhasil logout!";
header("Location: /perizinan"); // Redirect ke halaman login
exit();
?>
