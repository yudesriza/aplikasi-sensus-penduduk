<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sensus Penduduk</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>

  <div class="jumbotron text-center bg-success" style="margin-bottom:0;border-radius: 0;">
    <h1>Aplikasi Sensus Penduduk</h1>
    <h2>Kab. Padang Pariaman, Provinsi Sumatera Barat</h2> 
  </div>

  <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <a class="navbar-brand" href="?p=home">Home</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      
      <form class="form-inline mt-2 mt-md-0">
        <input class="form-control mr-sm-2 " type="text" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-light" type="submit">Search</button>
      </form>
    </div> 
    <a href="?p=logout"><button class="btn btn-outline-light"><i data-feather="log-out"></i></button></a>
     
  </nav>
  
  <div class="container-fluid">
    <div class="row mt-4">
      <div class="col-sm-2">
        <div class="btn-group-vertical">
          <button type="button" class="btn btn-outline-secondary"><a href="?p=user">User</a></button>
          <button type="button" class="btn btn-outline-secondary"><a href="?p=daerah">Daerah</a></button>
          <button type="button" class="btn btn-outline-secondary"><a href="?p=penduduk">Penduduk</a></button>
        </div>
      </div>
        
      <div class="col-sm-10">  
          
          <?php
            if (isset($_SESSION['user'])) {
              include 'main.php';
            }
            else{
              echo "<script>window.location.replace('login.php')</script>";
            }
          ?>
      </div>
    </div>
  </div>

  <div class="row-lg mt-4 bg-secondary">
    <div class="text-center">
      <h5>Copyright &copy; YRiza 2019</h5>
      <br>
    </div>
  </div>
    
</body>

<script src="js/feather.min.js"></script>
<script>
  feather.replace();
</script>
</html>
