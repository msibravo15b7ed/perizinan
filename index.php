<?php
session_start();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Landing Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .modal-content {
            max-width: 400px;
            margin: auto;
            padding: 20px;
            border-radius: 10px;
        }
        .modal-body input {
            font-size: 14px;
            padding: 8px;
        }
        .modal-body button {
            font-size: 14px;
            padding: 10px;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="#">Perizinan Online</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="#">Beranda</a></li>
                <li class="nav-item"><a class="nav-link" href="#tentang">Tentang</a></li>
                <li class="nav-item"><a class="nav-link" href="perizinan.html">Perizinan</a></li>
                <li class="nav-item">
                    <button class="btn btn-light" data-bs-toggle="modal" data-bs-target="#authModal">Login / Register</button>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Slideshow -->
<div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="slide1.jpg" class="d-block w-100" alt="Slide 1">
        </div>
        <div class="carousel-item">
            <img src="slide2.jpg" class="d-block w-100" alt="Slide 2">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
    </button>
</div>

<!-- Tentang -->
<section id="tentang" class="py-5 text-center">
    <div class="container">
        <h2 class="mb-4">Tentang Kami</h2>
        <p class="lead">
            "Terwujudnya Masyarakat Kota Medan yang Berkah, Maju dan Kondusif"
        </p>
        <p class="lead">
            Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu Kota Medan bertujuan meningkatkan kualitas perizinan dan investasi di Kota Medan.
        </p>
    </div>
</section>

<!-- Modal Login & Register -->
<div class="modal fade" id="authModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 id="authTitle" class="modal-title">Login</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="loginForm" action="login.php" method="POST">
                    <input type="text" name="username" class="form-control mb-2" placeholder="Username" required>
                    <input type="password" name="password" class="form-control mb-2" placeholder="Password" required>
                    <button type="submit" class="btn btn-primary w-100">Masuk</button>
                </form>

                <form id="registerForm" action="register.php" method="POST" style="display: none;">
                    <input type="text" name="username" class="form-control mb-2" placeholder="Username" required>
                    <input type="email" name="email" class="form-control mb-2" placeholder="Email" required>
                    <input type="password" name="password" class="form-control mb-2" placeholder="Password" required>
                    <button type="submit" class="btn btn-success w-100">Daftar</button>
                </form>

                <div class="text-center mt-3">
                    <p id="toggleText">Belum punya akun? <a href="#" id="toggleForm">Register</a></p>
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="bg-dark text-white py-4">
      <div class="container text-center">
        <p class="mb-1">Kontak: +62 123 4567 890</p>
        <p class="mb-1">Lokasi: medan, Indonesia</p>
        <div>
          <a href="#" class="text-white me-3">Facebook</a>
          <a href="#" class="text-white me-3">Twitter</a>
          <a href="#" class="text-white">Instagram</a>
        </div>
      </div>
    </footer>
<!-- Bootstrap & SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
// Toggle antara Login & Register
document.getElementById("toggleForm").addEventListener("click", function() {
    let loginForm = document.getElementById("loginForm");
    let registerForm = document.getElementById("registerForm");
    let toggleText = document.getElementById("toggleText");
    let authTitle = document.getElementById("authTitle");

    if (loginForm.style.display === "none") {
        loginForm.style.display = "block";
        registerForm.style.display = "none";
        authTitle.innerText = "Login";
        toggleText.innerHTML = 'Belum punya akun? <a href="#" id="toggleForm">Register</a>';
    } else {
        loginForm.style.display = "none";
        registerForm.style.display = "block";
        authTitle.innerText = "Register";
        toggleText.innerHTML = 'Sudah punya akun? <a href="#" id="toggleForm">Login</a>';
    }
});

// Cek session untuk pesan sukses
<?php if (isset($_SESSION['success'])) { ?>
    Swal.fire({
        title: "Berhasil!",
        text: "<?php echo $_SESSION['success']; ?>",
        icon: "success",
        confirmButtonText: "OK"
    });
    <?php unset($_SESSION['success']); ?>
<?php } ?>
</script>

</body>
</html>
