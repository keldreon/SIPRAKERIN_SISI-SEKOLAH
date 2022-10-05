<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Pantau Siswa | Sistem Informasi Praktik Kerja Industri</title>
	<!--link the bootstrap css file-->
	<link href="<?php echo base_url("assets/css/material-kit.css?v=2.0.4"); ?>" rel="stylesheet" type="text/css" />	
	
		<link href='http://fonts.googleapis.com/css?family=Roboto:400,500' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
		<link href="<?php echo base_url("assets/css/custom.css"); ?>" rel="stylesheet" type="text/css" />
					   
</head>

<body class="profile-page sidebar-collapse bg-light">
<nav class="navbar navbar-default fixed-top navbar-expand-lg" color-on-scroll="100" id="sectionsNav">
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
		  <li class="nav-item">
			<a href="<?php echo site_url('PantauSiswa/logout/');?>" class="nav-link">Log Out</a>
		  </li>
        </ul>
      </div>
    </div>
  </nav>
  
<div class="page-header header-filter" data-parallax="false">
    <div class="container">
      <div class="row">
        <div class="col-md-6">          			
            <h2 class="title">Selamat Datang, <?php echo $dataPembimbing->nama_pembimbing;?></h2>            			
        </div>
      </div>
    </div>
  </div>
  <div class="main main-raised norma" id="Awal">		
		<div class="section section-basic">		
			<div class="container">             
				<div class="row">
				<?php $i=0; $j=0; $k=0;?>
				<?php echo $this->session->flashdata('msg'); ?>
					<div class="col-md-12 col-md-offset-2 well">													          
              <nav class="navbar navbar-expand-lg bg-primary">
              <div class="container">
                <div class="navbar-translate">
                  <a class="navbar-brand" href="#">Menu Panduan</a>                  
                </div>                
                  <ul class="navbar-nav">
                    <li class="nav-item">
                      <a href="#DafSis" class="nav-link">Daftar Siswa</a>
                    </li>
                    <li class="nav-item">
                      <a href="#Absensi" class="nav-link">Absensi Kehadiran Siswa</a>
                    </li>
                    <li class="nav-item">
                      <a href="#CatSis" class="nav-link">Catatan Kegiatan Siswa</a>
                    </li>					
                  </ul>
                </div>              
            </nav>
		</div>	
		</div>
                </div>                
			</div>			
		</div>
		<br/>
		<br/>
		<br/>

<div class="main main-raised">		
<div class="container">             
	<div class="row">				
		<div class="col-lg-12 col-md-12 col-sm-12 well">								`
         <h2 class="border-bottom border-gray pb-2 mb-0" id="DafSis>Daftar Siswa</h2>					
					<div class="table-responsive">							  
					<table class="table">			
						<thead>
							<tr>				
								<th>No</th> 
								<th>Nama</th>				  
								<th>Jurusan</th>	
								<th>Lab</th>
								<th>Status Akun</th>
							</tr>
						</thead>
						<?php foreach($dataSiswa->result() as $sis){?>
							<?php $i = $i+1; ?>
							<tr>
							<td><?php echo $i;?></td>
							<td><?php echo $sis->nama_siswa;?></td>
							<td><?php echo $sis->jurusan_siswa;?></td>
							<td><?php echo $sis->nama_lab;?></td>							
							<td><?php if($sis->aktivasi_akun ==1){ ?>
									<p class="text-success">Sudah diaktivasi</p>
									<?php }else if($sis->aktivasi_akun ==0){ ?>
									<p class="text-danger">Belum diaktivasi</p>
									<?php } ?>
							</td>
							</tr>
							<?php }?>
						</tbody>
						</table>
						</div>								        
      </div>		
	  </div>	  
	  </div>
	   </div>			     	
	  <br/>
		<br/>
		<br/>
		
		<div class="main main-raised">		
<div class="container">             
	<div class="row">				
		<div class="col-lg-12 col-md-12 col-sm-12 well">								`
         <h2 class="border-bottom border-gray pb-2 mb-0" id="Absensi">Absensi Kehadiran Siswa</h2>					
					                      <?php $attributes = array("class"=>"signupform");
						echo form_open("PantauSiswa/Absensi", $attributes);?>
							<small class="d-block text-right mt-3">
								<a href="#Awal">Kembali ke atas</a>
							</small>
						<div class="table-responsive">
						<table class="table">			
							<thead>
								<tr>				
									<th>No</th>
									<th>Kode Referal Siswa</th>
									<th>Waktu Absensi</th> 								
									<th>Nama</th>
									<th>Kehadiran</th>									
									<th>Acc</th>
								</tr>
							</thead>			  						
							<tbody>
								<?php foreach($catatanAbsen->result() as $ca){?>
								<?php $k = $k+1; ?>
								<tr href="#">
								<td><input name="id_absen[]" type="hidden" value="<?php echo $ca->id_absen; ?>" /><?php echo $k;?></td>
								<td><input name="kode_referal[]" type="hidden" value="<?php echo $ca->kode_referal; ?>" /><?php echo $ca->kode_referal;?></td>
								<td><?php echo $ca->waktu_kehadiran;?></td>
								<td><?php echo $ca->nama_siswa;?></td>								
								<td><?php if($ca->hadir==0){?></td>								
											<span>Tidak Hadir</span>
									<?php } if($ca->hadir==1){?>
											<span>Hadir</span>
									<?php } ?>
								<td>															
									<?php if($ca->acc_pembimbing==0 ||$ca->acc_pembimbing==NULL){ ?>													
												<a href="<?php echo site_url('PantauSiswa/hadirAbsensi/' .$ca->id_absen);?>">Acc</a>
									<?php }else{?>
												<a href="<?php echo site_url('PantauSiswa/cancelAbsensi/' .$ca->id_absen);?>">Batalkan Acc</a>
									<?php } ?>							
							</td>
								</tr>
								<?php }?>							
							</tbody>
						</table>
						</div>						
						<?php echo form_close();?>								
        <small class="d-block text-right mt-3">
			<a href="#Awal">Return to Top</a>
        </small>
      </div>		
	  </div>	  
	  </div>
	   </div>			     	
	  <br/>
		<br/>
		<br/>
		
<div class="main main-raised">		
<div class="container">             
	<div class="row">				
		<div class="col-lg-12 col-md-12 col-sm-12 well">								`
         <h2 class="border-bottom border-gray pb-2 mb-0" id="CatSis">Daftar Catatan Kegiatan Siswa</h2>					
		 				<small class="d-block text-right mt-3">
								<a href="#Awal">Kembali ke atas</a>
						</small>
					<<div class="table-responsive">		
					<table class="table">
						<thead>
							<tr>				
								<th>No</th> 								
								<th>Nama</th>
								<th>Judul</th>
								<th>Isi Catatan</th>
								<th class="text-center">Tanggal Tulis Kegiatan <br/>(YYYY-MM-DD)</th>								
							</tr>
						</thead>			  						
						<tbody>						
							<?php foreach($catatanKegiatan->result() as $ck){?>							
							<?php $j = $j+1; ?>
							<tr href="#">							
							<td><input name="id_kegiatan" type="hidden" value="<?php echo $ck->id_kegiatan; ?>" /><?php echo $j;?></td>
							<td><?php echo $ck->nama_siswa;?></td>
							<td><?php echo $ck->judul_tulisan;?></td>
							<td>
							<?php $ck->isi_tulisan;
							$str = word_limiter($ck->isi_tulisan, $limit = 5);							
							?>
							<a href="<?php echo site_url('PantauSiswa/klikCatatan/' .$ck->id_kegiatan);?>"><?php echo $str;?></a></td>					
							<td><?php echo $ck->tanggal_nulis;?></td>														
							</tr>
							<?php }?>							
						</tbody>
						</table>																
						</div>								
        <small class="d-block text-right mt-3">
			<a href="#Awal">Kembali ke atas.</a>
        </small>
      </div>		
	  </div>	  
	  </div>
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