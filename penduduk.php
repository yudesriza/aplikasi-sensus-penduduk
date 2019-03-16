<?php
	$aksi=isset($_GET['aksi']) ? $_GET['aksi'] : 'list';
	switch ($aksi) {
		case 'list' :
?>
			<h1><u>Daftar Penduduk</u></h1>
			<br><a class="btn btn-primary" role="button" href="index.php?p=penduduk&aksi=input">Tambah Data</a>
			
			<div class="table-responsive">
				<br>
				<table class="table table-hover">
					<tr>
						<th>No</th>
						<th>ID Penduduk</th>
						<th>Nama Penduduk</th>
						<th>Gaji</th>
						<th>Daerah</th>
						<th>Aksi</th>
					</tr>

					<?php
						include 'koneksi.php';

						$tampil = mysql_query("SELECT person.id, person.name, person.income, regions.name FROM regions INNER JOIN person ON regions.id=person.region_id");
						$no=1;
						while($data = mysql_fetch_array($tampil)){
					?>

							<tr>
								<td><?php echo $no; ?></td>
								<td><?php echo $data['id']; ?></td>
								<td><?php echo $data[1]; ?></td>
								<td><?php echo $data['income']; ?></td>
								<td><?php echo $data[3]; ?></td>
								
								
								<td align="center">
									<a class="btn btn-info btn-sm" href="?p=penduduk&aksi=edit&id_ubah=<?php echo $data['0']?>"><i data-feather="edit"></i></a> 
									<a class="btn btn-danger btn-sm" href="aksi_penduduk.php?proses=hapus&id_hapus=<?php echo $data['0']?>" onclick="return confirm('Yakin akan menghapus data <?php echo $data['0']?>?')"><i data-feather="trash"></i>
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
			<h1>Entri Data Penduduk</h1>
			<form method="post" action="aksi_penduduk.php?proses=entri">
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Nama Penduduk</label>
					<div class="col-sm-5">
						<input class="form-control" name="name" required>
					</div>
				</div>
				
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Daerah</label>
					<div class="col-sm-5">
						<select class="form-control" name="daerah">
							<?php
								include 'koneksi.php';
								$input = mysql_query("SELECT * FROM regions");
								$no=1;
								while($data_input = mysql_fetch_array($input)){
							?>
									<option value="<?php echo $data_input['id']?>"><?php echo $data_input['name']?></option>
							<?php 
									$no++;
								}
							?>
						</select>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Alamat</label>
					<div class="col-sm-5">
						<textarea class="form-control" name="alamat" rows="4" cols="25"></textarea>
					</div>
				</div>
					
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Pendapatan</label>
					<div class="col-sm-5">
						<input class="form-control" type="text" placeholder="Pendapatan"  name="income" required>
					</div>
				</div>
				
				<div class="form-group row">
					<div class="col-sm-2"></div>
					<div class="col-sm-5">
						<input class="btn btn-success" type="submit" name="submit" value="Simpan">
						<a class="btn btn-danger" role="button" href="index.php?p=penduduk">Kembali</a>
					</div>
				</div>
			</form>

<?php
		break;
		case 'edit':

			include 'koneksi.php';
			$tampil = mysql_query("SELECT person.id, person.name, person.region_id, regions.name, person.address, person.income FROM regions INNER JOIN person ON regions.id=person.region_id  where person.id='$_GET[id_ubah]'");
			$data=mysql_fetch_array($tampil);
?>
			<h1>Update Data Penduduk</h1>
			<form method="post" action="aksi_penduduk.php?proses=ubah&id_ubah=<?php echo $data['id']?>">
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">ID Penduduk</label>
					<div class="col-sm-5">
						<input class="form-control-plaintext" type="text" name="id" value="<?php echo $data['id']?>" readonly>
					</div>
				</div>
				
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Nama Penduduk</label>
					<div class="col-sm-5">
						<input class="form-control" type="text" name="name" value="<?php echo $data[1]?>">
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Daerah</label>
					<div class="col-sm-5">
						<select class="form-control" name="daerah">
							<?php
								$tampil_daerah = mysql_query("SELECT * FROM regions");
								$no=$data[2];
							?>
								<option value="<?php echo $data[2]?>"><?php echo $data[3]?></option>
							<?php 
								$count=1;
								while($data_daerah = mysql_fetch_array($tampil_daerah)){
									if($no==$data_daerah['id']) continue;
									else{
							?>
										<option value="<?php echo $data_daerah['id']?>"><?php echo $data_daerah['name']?></option>
							<?php			
									}
									$count++;
								}
							?>
						</select>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Alamat</label>
					<div class="col-sm-5">
						<textarea class="form-control" name="alamat" rows="4" cols="25"><?php echo $data['address']?></textarea>
					</div>
				</div>
					
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Pendapatan</label>
					<div class="col-sm-5">
						<input class="form-control" type="text" placeholder="Pendapatan"  name="income" value="<?php echo $data['income']?>">
					</div>
				</div>
				
				<div class="form-group row">
					<label class="col-sm-2 col-form-label"></label>
					<div class="col-sm-5">
						<input class="btn btn-success" type="submit" name="submit" value="Update">
						<a class="btn btn-warning" role="button" href="index.php?p=penduduk">Kembali</a>
					</div>
				</div>
			</form>

<?php
		break;
	}
?>