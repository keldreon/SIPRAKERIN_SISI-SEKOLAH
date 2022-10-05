<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Cek Status Penerimaan | Sistem Informasi Praktik Kerja Industri</title>
<link href="<?php echo base_url("assets/css/material-kit.css?v=2.0.4"); ?>" rel="stylesheet" type="text/css" />	

</head>

<body class="login-page sidebar-collapse">
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
          <li class="nav-item active">
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
<div class="page-header header-filter">
<div class="container">  
  <div class="row align-items-center h-100 justify-content-center no-gutters">	
				<div class="col-lg-5 col-md-7 align-self-center ml-auto mr-auto">			
			<?php echo $this->session->flashdata('msg'); ?><br/>
					<?php print_r($this->session->flashdata('msg2')); ?>
					<?php print_r($this->session->flashdata('msg3')); ?>
				<div class="card card-login">
					<?php $attributes = array("class"=>"form align-items-center");
					echo form_open("CekStatus/index", $attributes);?>
					<!--<img class="mb-4" src="../../assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">-->					
					<div class="card-header card-header-primary text-center">
						<h4 class="card-title">Cek Status Penerimaan</h4>
						<div class="social-line">		
							&nbsp
						</div>
					</div>
				<div class="card-body">									
				<div class="form-group bmd-form-group">
						
					</div>							
					<div class="form-group bmd-form-group">
						<label for="inputEmail" class="bmd-label-floating">Kode Pembimbing</label>
						<?php //harusnya pake kode_referal pas udah di acc euy. ?>
						<input class="form-control" name="kode"  type="text" value="<?php echo set_value('kode'); ?>" required autofocus/>
					</div>	
					<div class="form-group bmd-form-group">
						
					</div>							
					<div class="form-group bmd-form-group">
						
					</div>							
											
				</div>
				<div class="card-footer">
				<button class="btn btn-primary btn-block text-center" type="submit">Masuk</button>					
					<?php echo form_close(); ?>					
				</div>
			</div>
		</div>
	</div>				
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
        </script> - -       
      </div>
    </div>
  </footer>		
  </div>
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
