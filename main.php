<?php
include 'koneksi.php';
$page=(isset($_GET['p'])) ? $_GET['p'] : 'home';
	if ($page=='home') include ('home.php');
	if ($page=='user') include ('user.php');
	if ($page=='daerah') include ('daerah.php');
	if ($page=='penduduk') include ('penduduk.php');
	if ($page=='logout') include ('logout.php');
?>