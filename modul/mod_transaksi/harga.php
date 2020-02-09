
<?php
$connection = mysqli_connect("localhost", "root", "","apotik");
mysqli_select_db($connection,"apotik");
$id_produk = $_GET['id_produk'];
$kec = mysqli_query($connection,"SELECT * FROM harga WHERE id_produk='$id_produk'");
echo "<option value=''>Pilih</option>";
	while($k = mysqli_fetch_array($kec)){
    echo "<option value=\"".$k['id_harga']."\">".$k['kategori_harga']."</option>\n";
}
?>