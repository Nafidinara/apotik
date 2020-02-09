<?php
ob_start();
include "config/koneksi.php";
include "config/fungsi_hakakses.php";
include "config/fungsi_log.php";
include "config/fungsi_week.php";
function antiinjection($data){
  $filter_sql = mysqli_real_escape_string("localhost",stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  return $filter_sql;
}
date_default_timezone_set('Asia/Jakarta');
$username = $_POST['username'];
$pass     = md5($_POST['password']);
$login=mysqli_query($connection,"SELECT * FROM admins  WHERE nik='$username' AND password='$pass' AND blokir='N'");
$ketemu=mysqli_num_rows($login);
$r=mysqli_fetch_array($login);
$tanggal=date('Y-m-d h:i:sa');
if ($ketemu > 0){
session_start();
echo "
<link rel='stylesheet' href='loading.css'>
<div class='badan'>
<div class='content'>
<div class='loader-wrapper'>
      <span class='loader'><span class='loader-inner'></span></span>
</div>
</div>
</div>
";
  $_SESSION['nik']          = $r['nik'];
  $_SESSION['namalengkap']  = $r['nama_lengkap'];
  $_SESSION['passuser']     = $r['password'];
  $_SESSION['leveluser']    = $r['level'];
  $_SESSION['idgroup']    = $r['ID_GROUP'];

  $_SESSION['atasan']       = $r['atasan'];
  $_SESSION['superuser']       = $r['superuser'];
  setcookie('nik', $r['nik']);
  setcookie('idgroup', $r['ID_GROUP']);
  setcookie('code', $code);
  $_SESSION['code'] = $code;
  header('location:media.php?module=home');
}
else{
  tambahlog($username,'LOGIN','LOGIN','GAGAL');
  echo "<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
  <!-- Bootstrap 3.3.5 -->
  <link rel='stylesheet' href='bootstrap/css/bootstrap.css'>
  <link rel='stylesheet' href='loading.css'>
  <!-- Font Awesome -->
    <!-- Theme style -->
  <link rel='stylesheet' href='dist/css/AdminLTE.css'>
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->

       <div class='badan'>
       <div class='content'>
       <center>LOGIN GAGAL! <br>
        Username atau Password Anda tidak benar.<br>
        Atau account Anda sedang diblokir.<br>
        </div>

       <div class='loader-wrapper'>
             <span class='loader'><span class='loader-inner'></span></span>
       </div>
        </div>
        <script src='loading.js'></script>
        <script src='plugins/jQuery/jquery-2.2.3.min.js'></script>
        <!-- Bootstrap 3.3.6 -->
        <script src='bootstrap/js/bootstrap.min.js'></script>
        <!-- iCheck -->
        <script src='plugins/iCheck/icheck.min.js'></script>
        <script>
        $(window).on('load',function(){
          $('.loader-wrapper').fadeOut('slow');
        });
        </script>

 <link rel='stylesheet' href='dist/css/skins/_all-skins.min.css'>
        <div>
        </div>
        ";
  echo "<a href=index.php?url=$_GET[url]><b>ULANGI LAGI</b></a></center>  ";
}
ob_flush();
?>
