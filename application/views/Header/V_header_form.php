<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <meta name="description" content="">
    <meta name="author" content=""> 
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Formulir Pengajuan <?php echo $laboratorium->nama_lab;?> | Sistem Informasi Prakerin SMK</title>
	    <!-- Bootstrap core CSS -->	
    <link href="<?php echo base_url("assets/css/material-kit.css?v=2.0.4"); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url("assets/css/custom.css"); ?>" rel="stylesheet" type="text/css" />
	<style>
	.custom-file-input ~ .custom-file-label::after {
		content: "Button Text";
	}
	</style>
</head>

<body class="index-page sidebar-collapse">
<nav class="navbar navbar-color-on-scroll fixed-top navbar-expand-lg" color-on-scroll="100" id="sectionsNav">
    <div class="container">
      <div class="navbar-translate">
        <a class="navbar-brand" href="<?php echo site_url('Home/index/');?>">Sistem Informasi Prakerin SMK</a>
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