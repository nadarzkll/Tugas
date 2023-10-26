<?php
session_start();

// Proses verifikasi login
if ($_POST['username'] == 'rizz' && $_POST['password'] == '123') {
    $_SESSION['loggedin'] = true;
    header('Location: admin.php'); // Arahkan ke halaman admin jika login berhasil
    exit;
} else {
    echo 'Login Gagal. Silakan coba lagi.';
}
?>
