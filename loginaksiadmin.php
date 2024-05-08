<?php
session_start();
require "koneksi.php";

$user = $_POST['User'];
$Password = $_POST['Password'];

$result = mysqli_query($conn, "SELECT * FROM admin WHERE User='$user'" );

$row = mysqli_fetch_assoc($result);

if (password_verify($Password, $row['Password'])){
    $_SESSION['login'] = true;
    $_SESSION['nama'] = $row['User'];
    $_SESSION['foto'] = 'admin.jpg';
    $_SESSION['hakakses'] = 'admin';
    header("Location: index.php");
} else {
    echo "
    <script>
    alert('Username atau Password salah')
    document.location.href='loginadmin.php';
    </script>
    ";

}


