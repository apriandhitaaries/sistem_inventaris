<?php
require 'koneksi.php';

// cek login
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // cek
    $cekdatabase = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' AND password='$password'");
    $cek = mysqli_num_rows($cekdatabase);

    if ($cek > 0) {
        $_SESSION['log'] = 'True';
        $_SESSION['username'] = $username;
        header('Location: index.php');
    } else {
        session_destroy();
        setcookie(session_name(), '', 0, '/');
        header('Location: login.php');
    }
}
