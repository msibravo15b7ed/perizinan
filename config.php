<?php
$host = "localhost"; // Default localhost
$user = "root"; // Default user
$password = ""; // Kosongkan jika tidak ada password
$database = "perizinan_db"; // Ganti dengan nama database kamu

$conn = new mysqli($host, $user, $password, $database);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
