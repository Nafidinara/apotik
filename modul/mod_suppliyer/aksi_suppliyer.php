<script src="../../dist/sweetalert-dev.js"></script>
<link rel="stylesheet" href="../../dist/sweetalert.css">

<?php
session_start();
if (empty($_SESSION['nik']) AND empty($_SESSION['passuser'])){
  echo "<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link rel='stylesheet' href='bootstrap/css/bootstrap.css'>
    <link rel='stylesheet' href='dist/css/AdminLTE.css'>
    <link rel='stylesheet' href='dist/css/skins/_all-skins.min.css'>
    <center>Untuk mengakses modul, Anda harus login <br>";
       echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
  include "../../config/koneksi.php";

  include "../../config/fungsi_log.php";


	$nik=$_SESSION['nik'];
	$atasan=$_SESSION['atasan'];
	$module=$_GET['module'];
	$act=$_GET['act'];

  // $codePerusahaan = 1;

    if ($module=='suppliyer' AND $act=='input'){
      $connection = mysqli_connect("localhost", "root", "","apotik");
      $insert = mysqli_query($connection,"INSERT INTO `suppliyer` (`nm_suppliyer`,
                                                  `alamat`,                                            
                                                  `telp`,
												  `created_date`
											)
                                          VALUES ('$_POST[nm_suppliyer]',
                                                  '$_POST[alamat]',
												  '$_POST[telp]',
												    NOW()
												  )");



                if($insert) {
                     echo "<script type='text/javascript'>
                         setTimeout(function () {
                           swal('Succes!', 'Berhasil Di tambahkan', 'success')
                         },10);
                         window.setTimeout(function(){
                           window.location.replace('../../media.php?module=$module');
                         } ,2000);
                       </script>";
                 }

      // header('location:../../media.php?module=ptk');
      }

    // delete module ptk
    elseif ($module=='ptk' AND $act=='delete'){

          $C_KODEJAB=$_GET['C_KODEJAB'];
          $insert = mysqli_query($connection,"DELETE FROM `ptk` WHERE C_KODEJAB='$C_KODEJAB' ");


            if($insert) {
                tambahlog($nik,$module,'DELETE','BERHASIL');
                  echo "<script type='text/javascript'>
                      setTimeout(function () {
                        swal('Deleted !', 'Kode ptk ( $C_KODEJAB ) Berhasil di Hapus', 'error')
                      },10);
                      window.setTimeout(function(){
                        window.location.replace('../../media.php?module=$module');
                      } ,1500);
                    </script>";
              }

    }




}
?>

<!-- <script src="../../plugins/jQuery/jquery-2.2.3.min.js"></script> -->
