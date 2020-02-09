<?php


require_once('fungsi_validasi.php');

$server =  "localhost";
$username = "root";
$password = "";
$database = "apotik";

// Koneksi dan memilih database di server
$connection = mysqli_connect($server, $username, $password,$database) or die("Koneksi gagal");
mysqli_select_db($connection,$database) or die("Database tidak bisa dibuka");


// buat variabel untuk validasi dari file fungsi_validasi.php
$val = new Rizalvalidasi;


?>
