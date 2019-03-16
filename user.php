<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
	<meta name="generator" content="Jekyll v3.8.5">

	<title>User</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>

<?php
	$aksi=isset($_GET['aksi']) ? $_GET['aksi'] : 'list';
	switch ($aksi) {
		case 'list' :
?>
			<h1><u>Daftar User</u></h1>
			<br><a class="btn btn-primary" role="button" href="index.php?p=user&aksi=input">Tambah Data</a>
			

			<div class="table-responsive">
				<br>
				<table class="table table-hover">
					<tr>
						<th>No</th>
						<th>ID User</th>
						<th>Email</th>
						<th>Aksi</th>
					</tr>

					<?php
						$ambil = mysql_query("SELECT * FROM users");
						$no=1;
						while($data = mysql_fetch_array($ambil)){
					?>

					<tr>
						<td><?php echo $no; ?></td>
						<td><?php echo $data['id']; ?></td>
						<td><?php echo $data['email']; ?></td>
						
						<td>
							<a class="btn btn-info btn-sm" href="?p=user&aksi=edit&id_ubah=<?php echo $data['id']?>"><i data-feather="edit"></i></a> 
							<a class="btn btn-danger btn-sm" href="aksi_user.php?proses=hapus&id_hapus=<?php echo $data['id']?>" onclick="return confirm('Yakin akan menghapus data <?php echo $data['id']?>?')"><i data-feather="trash"></i>
							</a>
						</td>
					</tr>
					<?php
						$no++;
						}
					?>
				</table>
			</div>
<?php
		break;
		case 'input' :
?>
			<h1>Entri User</h1>
			<form method="post" action="aksi_user.php?proses=entri">
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Email</label>
					<div class="col-sm-5">
						<input type="email" class="form-control" placeholder="Email" name="email" required>
					</div>
				</div>
							
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Password</label>
					<div class="col-sm-5">
						<input type="password" class="form-control" placeholder="Password" name="password" required>
					</div>
				</div>

				<div class="form-group row">
					<div class="col-sm-2"></div>
					<div class="col-sm-5">
						<input class="btn btn-success" type="submit" name="submit" value="Simpan">
						<a class="btn btn-danger" role="button" href="index.php?p=user">Kembali</a>
					</div>
				</div>
			</form>

<?php
		break;
		case 'edit':

			include 'koneksi.php';

			$tampil=mysql_query("SELECT * FROM users where id='$_GET[id_ubah]'");
			$data=mysql_fetch_array($tampil);
?>
			<h1>Update User</h1>
			<form method="post" action="aksi_user.php?proses=ubah&id_ubah=<?php echo $data['id']?>">
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">ID User</label>
					<div class="col-sm-5">
						<input class="form-control-plaintext" type="text" name="id_user" value="<?php echo $data['id']?>" readonly>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Email</label>
					<div class="col-sm-5">
						<input class="form-control" type="email" name="email" value="<?php echo $data['email']?>">
					</div>
				</div>
				
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Password</label>
					<div class="col-sm-5">
						<input class="form-control" type="password" name="password"  value="<?php echo $data['password']?>">
					</div>
				</div>
				
				<div class="form-group row">
					<label class="col-sm-2 col-form-label"></label>
					<div class="col-sm-5">
						<input class="btn btn-success" type="submit" name="submit" value="Update">
						<a class="btn btn-warning" role="button" href="index.php?p=user">Kembali</a>
					</div>
				</div>
			</form>
<?php
		break;
	}
?>