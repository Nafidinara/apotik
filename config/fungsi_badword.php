<?php
function sensor($teks){
    $connection = mysqli_connect("localhost", "root","","apotik");
    $w = mysqli_query($connection,"SELECT * FROM katajelek");
    while ($r = mysqli_fetch_array($w)){
        $teks = str_replace($r['kata'], $r['ganti'], $teks);       
    }
    return $teks;
}  
?>
