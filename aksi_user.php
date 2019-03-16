<?php
	include 'koneksi.php';
	if($_GET['proses']=='entri'){
		if (isset($_POST['submit'])) {
			$pass=md5($_POST['password']);
			$simpan = mysql_query("INSERT INTO users(email, password, created_at) VALUES ('$_POST[email]', '$pass', 'now()')");

			if ($simpan) {
				header('location:index.php?p=user');
			}
			else{
				echo "Gagal Disimpan";
			}
		}
	}

	if($_GET['proses']=='ubah'){
		if (isset($_POST['submit'])) {
			$pass=md5($_POST['password']);
			$ubah=mysql_query("UPDATE users set
							id = '$_POST[id_user]',
							email = '$_POST[email]',
							password = '$pass'
							where id='$_GET[id_ubah]'
							");

			if ($ubah) {
				header('location:index.php?p=user');
			}
			else{
				echo "Gagal";
			}
		}
	}

	if($_GET['proses']=='hapus'){
		$hapus = mysql_query("DELETE FROM users where id='$_GET[id_hapus]'");

		if($hapus){
			header('location:index.php?p=user');
		}
	}
?>