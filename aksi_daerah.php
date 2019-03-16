<?php
	include 'koneksi.php';
	if($_GET['proses']=='entri'){
		if (isset($_POST['submit'])) {
			$simpan = mysql_query("INSERT INTO regions(name, created_at) VALUES ('$_POST[name]','now()')");

			if ($simpan) {
				header('location:index.php?p=daerah');
			}
			else{
				echo "Gagal Disimpan";
			}
		}
	}

	if($_GET['proses']=='ubah'){
		if (isset($_POST['submit'])) {
			$ubah=mysql_query("UPDATE regions set
							id = '$_POST[id]',
							name = '$_POST[name]'
							where id='$_GET[id_ubah]'
							");

			if ($ubah) {
				header('location:index.php?p=daerah');
			}
			else{
				echo "Gagal";
			}
		}
	}

	if($_GET['proses']=='hapus'){
		$hapus = mysql_query("DELETE FROM regions where id='$_GET[id_hapus]'");

		if($hapus){
			header('location:index.php?p=daerah');
		}
	}
?>