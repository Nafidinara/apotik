                <?php
					include "../../config/koneksi.php";
					$tanggal = date('Y-m-d');
				?>
                <table class="oke table table-bordered" id="tabelPen">
				<div style="margin-bottom: 30px; margin-left:15px;" id="mantap">
				<input type="text" style="width: 70%" maxlength="10" class="form-control" name="tanggalf" id="inputTgl" placeholder='<?php echo date('Y-m-d')?>'>
					</div>
					<tbody>
					<tr>
						<th>No</th>
						<th>Kd_obat</th>
						<th>Nama</th>
						<th>jml Beli</th>
						<th>jml pcs</th>
						<th>Jenis</th>
						
						<th>Harga</th>
						<th>Diskon</th>
						
						<th>Total</th>
						<th>Tanggal</th>
					</tr>

					<?php
						$tampil = mysqli_query($connection,"SELECT * FROM detail_transaksi");
						$no = 1;
						while($r=mysqli_fetch_array($tampil)){
							$harga_diskon = $r['harga'] * $r['diskon'] / 100;
							$harga_real=$r['harga'] - $harga_diskon;
							$total2 = $harga_real * $r['jumlah'];
							$subtotal=number_format($total2,0,",",".");
							$totalsemua = number_format($total2,0,",",".");
					   echo "<tbody id='myTable'>
					   <tr>
					  	<td><center>$no</center></td>
						<td><input type='hidden' name='kd_obat[]' value='$r[kd_obat]'>$r[kd_obat]</td>
						<td>$r[nm_produk]</td>
						
						<td><input type='hidden' name='jumlah[]' value='$r[jumlah]'>$r[jumlah]</td>
						<td><input type='hidden' name='jumlah_pcs[]' value='$r[jumlah_pcs]'>$r[jumlah_pcs]</td>
						<td><input type='hidden' name='jenis[]' value='$r[jenis]'>$r[jenis]</td>
					
						<td>$r[harga]</td>
						<td><input type='hidden' name='diskon[]' value='$r[diskon]'>$r[diskon] %</td>
						
						<td>$totalsemua</td>
						<td><input type='hidden' name='tanggal[]' value='$r[tanggal]'>$r[tanggal]</td>"; ?>
						</tr>
						</tbody>
					  <?php
						$no++; } ?>
				</tbody>
				</table>
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
				<script type="text/javascript">
					$(document).ready(function(){
  					$("#inputTgl").on("keyup", function() {
    				var value = $(this).val().toLowerCase();
    				$("#myTable tr").filter(function() {
      				$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
					});
					});
					});
    			</script>
