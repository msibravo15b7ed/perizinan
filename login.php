<?php
session_start();
include 'config.php'; // Pastikan koneksi database benar

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Cek apakah username dan password kosong
    if (empty($username) || empty($password)) {
        die("Username atau password tidak boleh kosong!");
    }

    $query = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
    
        if (password_verify($password, $user['password'])) {
            $_SESSION['username'] = $username;
    
            ob_end_flush(); // Pastikan tidak ada output sebelum header()
            header("Location: dashboard.php");
            die(); // Hentikan eksekusi setelah redirect
        } else {
            echo "Password salah!";
        }
    } else {
        echo "Username tidak ditemukan!";
    }    
}
?>
