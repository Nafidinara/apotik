<?php
include "config/koneksi.php";
$a=mysqli_fetch_array(mysqli_query($connection,"SELECT * FROM admins WHERE nik='$_SESSION[nik]'"));
echo "<p>$a[nama_lengkap]</p>"; 

?>
