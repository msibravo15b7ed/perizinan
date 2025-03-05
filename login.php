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

    // Debugging: Tampilkan username yang dikirim
    echo "DEBUG: Username yang dimasukkan: " . htmlspecialchars($username) . "<br>";

    $query = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        
        // Debugging: Tampilkan password hash dari database
        echo "DEBUG: Password Hash dari DB: " . $user['password'] . "<br>";

        if (password_verify($password, $user['password'])) {
            $_SESSION['username'] = $username;
            
            // Debugging sebelum redirect
            echo "Login Berhasil! Redirecting...";
            ob_end_flush(); // Pastikan tidak ada output sebelum header()
            header("Location: dashboard.php");
            exit();
        } else {
            echo "Password salah!";
        }
    } else {
        echo "Username tidak ditemukan!";
    }
}
?>
