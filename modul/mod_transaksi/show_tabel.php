                <?php
				$aksi="modul/mod_transaksi/aksi_transaksi.php";
                    include "../../config/koneksi.php";
                    include "../../config/fungsi_hakakses.php";
                    include "../../config/fungsi_log.php";
				?>

                <table class="table table-bordered" id="tabelPen">
					<tbody><tr>
						<th>No</th>
						<th>Kd_obat</th>
						<th>Nama</th>
						<th>jml Beli</th>
						<th>Jenis</th>
						
						<th>Harga</th>
						<th>Diskon</th>
						
						<th>Total</th>
						<th>Aksi</th>
					</tr>

					<?php
						print_r($r['diskon']);
						$no = 1;
						$tampil = mysqli_query($connection,"SELECT * FROM order_temp JOIN produk ON order_temp.kd_obat = produk.kd_obat
												JOIN harga ON order_temp.id_harga = harga.id_harga");
						while($r=mysqli_fetch_array($tampil)){
							if($r['diskon'] == '0'){
								$total = $r['harga'] * $r['jml'];
							}else{
								$diskon = $r['diskon']/100;
								$total = ($r['harga'] * $r['jml']) * $diskon;
							}
					   echo " <tr>
					  	<td><center>$no</center></td>
						<td><input type='hidden' name='kd_obat[]' value='$r[kd_obat]'>$r[kd_obat]</td>
						<td>$r[nm_barang]</td>
						
						<td><input type='hidden' name='jumlah[]' value='$r[jml]'>$r[jml]</td>
						<td><input type='hidden' name='id_harga[]' value='$r[id_harga]'>$r[kategori_harga]</td>
						<td>$r[harga]</td>
						<td><input type='hidden' name='diskon[]' value='$r[diskon]'>$r[diskon] %</td>
						
						<td>$total</td>
						<td>"; ?>
						<a href="#" onclick="confirm_modal('<?php echo"$aksi";?>?module=transaksi&act=delete&id_order=<?php echo  $r['id_order']; ?>');" class="btn bg-red smallbtn"><i class="fa fa-fw fa-close"></i>hapus</a>
						
						</td></tr>
					  <?php
						$no++; } ?>

				</tbody>

				</table>
