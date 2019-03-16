<?php
	include 'koneksi.php';
	if($_GET['proses']=='entri'){
		if (isset($_POST['submit'])) {
			$time = date("Y-m-d H:i:s");
			$simpan=mysql_query("INSERT INTO person(name, region_id, address, income, created_at) VALUES ('$_POST[name]' ,'$_POST[daerah]', '$_POST[alamat]', '$_POST[income]', '$time')");

			if ($simpan) {
				header('location:index.php?p=penduduk');
			}
			else{
				echo "Gagal";
			}
		}
	}

	if($_GET['proses']=='ubah'){
		if (isset($_POST['submit'])) {
			$ubah=mysql_query("UPDATE person set
							id = '$_POST[id]',
							name = '$_POST[name]',
							region_id = '$_POST[daerah]',
							address = '$_POST[alamat]',
							income = '$_POST[income]'
							where id='$_GET[id_ubah]'
							");

			if ($ubah) {
				header('location:index.php?p=penduduk');
			}
			else{
				echo "Gagal";
			}
		}
	}

	if($_GET['proses']=='hapus'){
		$hapus = mysql_query("DELETE FROM person where id='$_GET[id_hapus]'");
		if($hapus){
			header('location:index.php?p=penduduk');
		}
	}
?>