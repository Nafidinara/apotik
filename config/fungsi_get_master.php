<?php





	//function get jabatan
	function get_master_customer(){
		$connection = mysqli_connect("localhost", "root","","apotik");
			$show=mysqli_query($connection,"SELECT * FROM member");
				if(mysqli_num_rows($show) != 0){
					echo '<option value="">Pilih customer</option>';
					while($row = mysqli_fetch_array($show)){
						$kd_member = $row['kd_member'];
						$nm_member = $row['nm_member'];
						echo '<option value='.$kd_member.'>'.$nm_member.'</option>';
					}
				}
	}

	//function get karyawan
	function get_master_suppliyer(){
		$connection = mysqli_connect("localhost", "root","","apotik");
			$show=mysqli_query($connection,"SELECT * from suppliyer");
				if(mysqli_num_rows($show) != 0){
					echo '<option value="">Pilih Suppliyer</option>';
					while($row = mysqli_fetch_array($show)){
						$id_suppliyer = $row['id_suppliyer'];
						$nm_suppliyer = $row['nm_suppliyer'];
						echo '<option value='.$id_suppliyer.'>'.$nm_suppliyer.'</option>';
					}
				}
	}

	
	



	

	//function get master Aplikasi
	function get_master_kategori(){
		$connection = mysqli_connect("localhost", "root","","apotik");
		$show=mysqli_query($connection,"SELECT * FROM kategori");
			if(mysqli_num_rows($show) != 0){
				echo '<option value="">Pilih</option>';
				while($row = mysqli_fetch_array($show)){
					$kd_kategori = $row['kd_kategori'];
					$nm_kategori = $row['nm_kategori'];
					echo "<option value='$kd_kategori'>$nm_kategori</option>";
				}
			}
	}

	//function get master Aplikasi
	function get_master_produk(){
		$connection = mysqli_connect("localhost", "root","","apotik");
		$show=mysqli_query($connection,"SELECT * FROM produk");
			if(mysqli_num_rows($show) != 0){
				echo '<option value="">Pilih</option>';
				while($row = mysqli_fetch_array($show)){
					$c_prodcode = $row['c_prodcode'];
					$c_realname = $row['c_realname'];
					echo "<option value='$c_prodcode'>$c_prodcode - $c_realname</option>";
				}
			}
	}

	 ?>
