<h1><u>Data Daerah</u></h1>
<br>		
<div class="table-responsive">
	<br>
	<table class="table table-hover">
		<tr>
			<th>No</th>
			<th>ID Daerah</th>
			<th>Nama Daerah</th>
			<th>Jumlah Penduduk</th>
			<th>Total Pendapatan</th>
			<th>Rata-rata Pendapatan</th>
			<th>Status</th>
		</tr>

		<?php
			include 'koneksi.php';
			$tampil = mysql_query("SELECT regions.id, regions.name FROM regions");
			$no=1;
			while($data = mysql_fetch_array($tampil)){
				$alias = mysql_query("SELECT count(person.id)as jumlah, sum(person.income) as total, avg(person.income) as ratarata FROM regions INNER JOIN person ON regions.id=person.region_id");
				$data_alias = mysql_fetch_array($alias)
		?>
			<tr>
				<td><?php echo $no; ?></td>
				<td><?php echo $data[0]; ?></td>
				<td><?php echo $data[1]; ?></td>
				<td><?php echo $data_alias[0]; ?></td>
				<td><?php echo $data_alias[1]; ?></td>
				<td><?php echo $data_alias[2]; ?></td>
							
				<td align="center">
					<?php
						if ($data_alias[2] < '1700000') {
					?>
							<p class="bg-success">Hijau</p>
					<?php	
						}else if (($data_alias[2] >= '1700000') && ($data_alias[2] < '2200000')) {
					?>
							<p class="bg-warning">Kuning</p>
					<?php
						}else if ($data_alias[2] < '1700000') {
					?>
							<p class="bg-danger">Merah</p>
					<?php
						}
					?>
				</td>
			</tr>
		<?php
				$no++;
			}
		?>
	</table>
</div>