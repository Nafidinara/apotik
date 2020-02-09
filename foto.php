 <?php
include "config/koneksi.php";
$a=mysqli_fetch_array(mysqli_query($connection,"SELECT * FROM admin WHERE username='$_SESSION[namauser]'"));
echo "<img width=60 src='foto_user/$a[foto]' border=0 class='img-circle' alt='User Image' >"; 
?>