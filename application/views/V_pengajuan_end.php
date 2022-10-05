<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Cek Status | Sistem Informasi Praktek Kerja Industri</title>
	<!--link the bootstrap css file-->
	<link href="<?php echo base_url("assets/css/material-kit.css?v=2.0.4"); ?>" rel="stylesheet" type="text/css" />		
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
  
  <div class="page-header header-filter" data-parallax="true" style="background-image: url('assets/img/bg3.jpg')">
    <div class="container">
      <div class="row">
        <div class="col-md-6">          
            <h2 class="title">Permintaan Pengajuan Lab</h2>            
			<?php //nanti diilangin dulu datanya terus dimunculin lagi kalau diklik selesai.?>
			<i><h3>Kode <span class="label label-info"><?php echo $dataSekolah->kode_masuk;?></span></h3></i>
			<h3>Masukkan kode di atas untuk mengecek status pengajuan lab.</p></h3>					
        </div>
      </div>
    </div>
  </div>
<div class="main main-raised">
<?php echo $this->session->flashdata('msg'); ?>
<div class="section section-basic">
<div class="container">             
	<div class="row">
		<div class="col-md-12 col-md-offset-2 well">								
			<div class="form-group">				
				<h5 class="title">Data Sekolah</h5>
				<div class="table-responsive">
            		<table class="table table-striped">			
              		<tbody>
                		<tr>				
                  		<th>Nama Sekolah</th> 
                  		<td><?php echo $dataSekolah->nama_sekolah;?></td>				  						  				  						
                		</tr>
              		</tbody>			  
              		<tbody>			  
                		<tr>
                  		<th>Alamat Sekolah</th>				  
				  		<td><?php echo $dataSekolah->alamat_sekolah;?></td>                  				
				  		</tr>				  								
              		</tbody>
              		<tbody>
              			<tr>
              			<th>No Hp/Telp Sekolah</th>
              			<td><?php echo $dataSekolah->kontak_sekolah;?></td>
              		</tbody>			  			  
            	</table>										 
          	</div> 
		</div> 			
<br/>
			<div class="form-group">
				<h5 class="title">Data Pembimbing</h5>
				<div class="table-responsive">
            		<table class="table table-striped">			
              		<tbody>
                		<tr>				
                  		<th>Nama Pembimbing</th> 
                  		<td><?php echo $dataPembimbing->nama_pembimbing;?></td>
                  		</tr>
              		</tbody>			  
              		<tbody>			  
                		<tr>
                  		<th>Jabatan Pembimbing</th>				  
				  		<td><?php echo $dataPembimbing->jabatan_pembimbing;?></td>
						</tr>				  								
              		</tbody>
              		<tbody>
              			<tr>
              			<th>No Hp/Telp Pembimbing</th>
              			<td><?php echo $dataPembimbing->kontak_pembimbing;?></td>
              		</tbody>
              		<tbody>
              			<tr>
              			<th>Email Pembimbing</th>
              			<td><?php echo $dataPembimbing->email_pembimbing;?></td>
              		</tbody>			  			  
            	</table>										 
          	</div>
			</div>
         <br/> 	
		<h5 class="title">Data Siswa</h5>		
          <div class="table-responsive">
            <table class="table table-striped">			
              <thead>
                <tr>                  
                  <th>NIS</th>
                  <th>Nama</th>
                  <th>Jurusan</th>
				  <th>Lab yang diajukan</th>                       
                </tr>
              </thead>			 
              <tbody>			  
              	<?php foreach($dataSiswa->result() as $sis): ?>
                <tr>
                  <td><?php echo $sis->NIS_siswa; ?></td>
                  <td><?php echo $sis->nama_siswa; ?></td>
                  <td><?php echo $sis->jurusan_siswa; ?></td>      
                  <td><?php echo $sis->nama_lab; ?></td>      				  
                </tr>      
			<?php endforeach?>			  				
              </tbody>			
            </table>            
          </div>   
			<div class="form-group">	
				<center><a class="btn btn-primary" href="<?php echo base_url(); ?>index.php/Home/index">Kembali</a></center>				
			</div>
		<?php echo form_close(); ?>				
			</div>
			</div>
			</div>
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