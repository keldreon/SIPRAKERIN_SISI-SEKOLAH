<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Catatan Kegiatan | Sistem Informasi Praktik Kerja Industri</title>
	<!--link the bootstrap css file-->
	<link href="<?php echo base_url("assets/css/material-kit.css?v=2.0.4"); ?>" rel="stylesheet" type="text/css" />	
	
		<link href='http://fonts.googleapis.com/css?family=Roboto:400,500' rel='stylesheet' type='text/css'>
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/default.css");?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/component.css");?>" />    
	<link href="<?php echo base_url("assets/css/custom.css"); ?>" rel="stylesheet" type="text/css" />
	
</head>

<body class="sidebar-collapse">
<nav class="navbar navbar-default  navbar-expand-lg" color-on-scroll="100" id="sectionsNav">
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
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a href="<?php echo site_url('CekStatus/index/');?>" class="nav-link">Cek Status Penerimaan</a>	                        
          </li>
		  <li class="nav-item active">
			<a href="<?php echo site_url('PantauSiswa/index/');?>" class="nav-link">Cek Aktivitas Siswa</a>
		  </li>		  
		  <li class="nav-item">
			<a href="http://localhost/sisi_siswa" class="nav-link" target="_blank">Login Siswa</a>
		  </li>
		  <li class="nav-item">
			<a href="<?php echo site_url('Home/Panduan/');?>" class="nav-link">Panduan</a>
		  </li>        
		  <li class="nav-item">
			<a href="<?php echo site_url('PantauSiswa/logout/');?>" class="nav-link">Log Out</a>
		  </li>
        </ul>
      </div>
    </div>
  </nav>  
    
<div class="main main-raised norma">
<br/>
  <div class="container">  
  <?php $today = date("Y-m-d H:i:s");?>  
    <input name="today" id="today" type="hidden" value="<?php echo $today; ?>" />
		<div class="row">	              
        <header class="clearfix">          
          <?php $todayUI = date("Y-m-d");?>
        <span>Waktu : <?php echo $todayUI; ?> &nbsp </span>
          <?php // if ($date > $today) else ?>                      
		<span class="info-text">| &nbsp Penulis : <?php echo $kegiatanku->nama_siswa; ?></span>          		
    </header>                         		
		<div class="main container norma">
      <div class="row">
        <div class="col-md-12 well">
          <!-- col-md-offset-2 well -->
          <p class="text-right">Tanggal Penulisan : <?php echo $kegiatanku->tanggal_nulis; ?></p>          		
            <input name="kode_teks" id="kode_teks" type="hidden" value="<?php echo $kegiatanku->id_kegiatan; ?>" />            
            <br/>      
            <div class="form-group">              
              <label for="name">Judul Kegiatan</label>
              <input class="form-control" name="judul_kegiatan"  type="text" value="<?php echo $kegiatanku->judul_tulisan;?>" readonly/>
            </div>
            <div class="form-group">              
              <textarea class="form-control" name="kegiatanku" id="kegiatanku" placeholder="Kegiatanku Hari ini..." rows="10" cols="80" value="<?php form_textarea(array('kegiatanku'=>'kegiatanku'),set_value('kegiatanku'));?>" readonly><?php echo $kegiatanku->isi_tulisan;?></textarea>
            </div>                          
        </div>
      </div>
    </div>	
  </div>  
  </div>  
  </div>
  <footer class="footer footer-default text-primary">
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
        </script> - -       
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

</body>
</html>