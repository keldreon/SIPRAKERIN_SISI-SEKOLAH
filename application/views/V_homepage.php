<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">    

    <title>Beranda &nbsp|&nbsp Sistem Informasi Praktik Kerja Industri</title>

    <!-- Bootstrap core CSS -->	
    <link href="<?php echo base_url("assets/css/material-kit.css?v=2.0.4"); ?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url("assets/css/custom.css"); ?>" rel="stylesheet" type="text/css" />
    
  </head>
  
  <body class="profile-page sidebar-collapse">
  <nav class="navbar navbar-transparent navbar-color-on-scroll fixed-top navbar-expand-lg" color-on-scroll="100" id="sectionsNav">
    <div class="container">
      <div class="navbar-translate">
        <a class="navbar-brand" href="<?php echo site_url('Home/index/');?>">SIPRAKERIN</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="sr-only">Toggle navigation</span>
          <span class="navbar-toggler-icon"></span>
          <span class="navbar-toggler-icon"></span>
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a href="<?php echo site_url('CekStatus/index/');?>" class="nav-link">Cek Status Penerimaan</a>	                        
          </li>
		  <li class="nav-item">
			<a href="<?php echo site_url('PantauSiswa/index/');?>" class="nav-link">Cek Aktivitas Siswa</a>
		  </li>		  
		  <li class="nav-item">
			<a href="http://localhost/sisi_siswa" class="nav-link" target="_blank">Login Siswa</a>
		  </li>
		  <li class="nav-item">
			<a href="<?php echo site_url('Home/Panduan/');?>" class="nav-link">Panduan</a>
		  </li>
        </ul>
      </div>
    </div>
  </nav>  
  <div class="page-header header-filter" data-parallax="false">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">          
            <h1 class="title">Beranda</h1>
            <h4>Selamat Datang di Sistem Informasi Praktik Kerja Industri SMK. </h4>
        </div>
      </div>
    </div>
  </div>
  <div class="main norma">
    <div class="container">
      <div class="section text-center">
        <h2>Laboratorium Praktik Kerja Industri</h2> 
	  <div class="row mb-2"> 
	  <?php foreach($laboratorium->result() as $lab):?>
        <div class="col-md-6">
          <div class="card flex-sm-row mb-4 h-md-250">
            <div class="card-body d-flex flex-column align-items-start">
              <strong class="d-inline-block mb-1 text-primary">Laboratorium</strong>
              <h3 class="mb-1">
                <?php echo $lab->nama_lab; ?>
              </h3>
              <div class="mb-1 text-muted">Terisi : <?php echo $lab->kapasitas_isi; ?> / <?php echo $lab->kapasitas_maksimum; ?></div>
              <p class="card-text"><?php echo $lab->desk_lab; ?></p>
			  <?php if($lab->status==1){?>
              <a href="<?php echo site_url('Home/klikLab/' .$lab->id_lab);?>" >Ajukan</a>			  
			  <?php }else if($lab->status==0){?>
				<p class="text-danger">Ditutup</p>
			  <?php } ?>
			  <a href="<?php echo site_url('Home/klikIsiLab/' .$lab->id_lab);?>" >Daftar Peminat</a>
            </div>            
          </div>
        </div>
	  <?php endforeach?>
      </div>
    </div>
	</div>
	<br/>
  </div>
  <footer class="footer footer-default">
    <div class="container">
      <nav class="float-left">
        <ul>
          <li>
            <a href="https://www.creative-tim.com/">
              Template by Creative Tim
            </a>
          </li>
        </ul>
      </nav>
      <div class="copyright float-right">
        &copy;
        <script>
          document.write(new Date().getFullYear())
        </script>        
      </div>
    </div>
  </footer>
  
	<script src="<?php echo base_url("assets/js/core/jquery.min.js");?>"  type="text/javascript"></script>
    <script src="<?php echo base_url("assets/js/core/popper.min.js");?>"  type="text/javascript"></script>
    <script src="<?php echo base_url("assets/js/core/jquery-slim.min.js");?>"  type="text/javascript"></script>
    <script src="<?php echo base_url("assets/js/plugins/moment.min.js"); ?>"  type="text/javascript"></script>
    <script src="<?php echo base_url("assets/js/bootstrap.min.js"); ?>"  type="text/javascript"></script>          
    <script src="<?php echo base_url("assets/js/core/bootstrap-material-design.min.js");?>" type="text/javascript"></script>
    <script src="<?php echo base_url("assets/js/plugins/nouislider.min.js");?>" type="text/javascript"></script>
	<script src="<?php echo base_url("assets/js/material-kit.js?v=2.0.4");?>" type="text/javascript"></script>
	<script src="<?php echo base_url("assets/js/modernizr.custom.js");?>" type="text/javascript"></script>
	<script src="<?php echo base_url("assets/js/plugins/holder.min.js");?>" type="text/javascript"></script>	
    <script>
      Holder.addTheme('thumb', {
        bg: '#55595c',
        fg: '#eceeef',
        text: 'Thumbnail'
      });
    </script>
  </body>
</html>
