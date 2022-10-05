<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Status Pengajuan | Sistem Informasi Praktik Kerja Industri</title>
	<link href="<?php echo base_url("assets/css/material-kit.css?v=2.0.4"); ?>" rel="stylesheet" type="text/css" />		
	<link href="<?php echo base_url("assets/css/custom.css"); ?>" rel="stylesheet" type="text/css" />
</head>

<body class="profile-page sidebar-collapse">
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
        </ul>
      </div>
    </div>
  </nav>	

<div class="page-header header-filter" data-parallax="true" style="background-image: url('assets/img/bg3.jpg')">
    <div class="container">
      <div class="row">
        <div class="col-md-6">          
            <h2 class="title">Permintaan Pengajuan Lab</h2>            
			<h3>Kode Pembimbing <?php echo $dataSekolah->kode_masuk;?></h3>
			<?php if($pengajuan == 0){?>
				<i><h3>Pengajuan sedang diproses oleh admin...</h3></i>			
			<?php }else if ($pengajuan  == 1){ ?>			
				<i><h3>Pengajuan sudah diproses oleh admin.</h3></i>
				<?php }?>
        </div>
      </div>
    </div>
  </div>
  
  <div class="main main-raised">
<div class="section section-basic">
<div class="container">             
	<div class="row">
		<div class="col-md-12 col-md-offset-2 well">
		<div class="form-group">
		<?php if($dataSekolah->file_surat != NULL){?>
				<div class="form-group">
				<label>File Surat Pengajuan : <?php echo $dataSekolah->file_surat;?></label><br/>
				<a class="btn btn-primary" href="<?php echo site_url('Pengajuan/downloadPengajuan/'.$dataSekolah->file_surat);?>">Unduh</a>
				</div>
			<?php } ?>
		</div>
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
         <br/> 	
		<h5 class="title">Data Siswa</h5>		
		<?php //$dl = array();?>		
        <div class="table-responsive">
            <table class="table table-striped">			
              <thead>
                <tr>                  
                  <th>NIS</th>
                  <th>Nama</th>
                  <th>Jurusan</th>
				  <th>Lab yang diajukan</th> 
				  <th>Status Pengajuan</th> 
				  <th>Kode Aktivasi Siswa</th>
				  <th>Pembimbing Lab</th>
				  <th>Tanggal Praktik</th>
                </tr>
              </thead>			 
              <tbody>			  
              	<?php foreach($dataSiswa->result() as $sis): ?>			
                <tr>
                  <td><?php echo $sis->NIS_siswa; ?></td>
                  <td><?php echo $sis->nama_siswa; ?></td>
                  <td><?php echo $sis->jurusan_siswa; ?></td>      
                  <td><?php echo $sis->nama_lab; ?></td> 
				  <td>				  											   
				  <?php if($sis->status_penerimaan_lab == 0){?>
					<span class="label label-info">Diproses</span>			  
				  <?php } else if($sis->status_penerimaan_lab == 1){ ?>				  
				    <span class="label label-success">Diterima</span>		
				  <?php } else if($sis->status_penerimaan_lab == 2){?>				  
				  <span class="label label-danger">Ditolak</span>	
				  <?php } else if($sis->status_penerimaan_lab == 3){?>				  
				  <span class="label label-danger">Selesai Prakerin</span>	
				  <?php } ?>				  
				  </td>      
				  <td>				  											   
				  <?php if($sis->kode_referal != NULL){?>
					<?php echo $sis->kode_referal;?>			  
				  <?php }else{?>
				  <span>--</span>
				  <?php } ?>
				  </td>
				  <td>				  											   
				  <?php if(!empty($sis->id_pemb_lab)){?>
				  <?php foreach($dat_lab->result() as $dl){?>
							<?php if($sis->id_pemb_lab == $dl->id_pemb_lab){?>
							<?php echo $dl->nama_pemb_lab;?>			  
							<?php } ?>
				  <?php } ?>					
				  <?php }else{?>
				  <span>--</span>
				  <?php } ?>
				  </td>
				  <td>				  											   
				  <?php if(($sis->tanggal_mulai_praktek != NULL)&& ($sis->tanggal_selesai_praktek != NULL)){?>		<?php $timeInit = strtotime($sis->tanggal_mulai_praktek); ?>
				  		<?php $timeEnd = strtotime($sis->tanggal_selesai_praktek); ?>
            			<?php $child1 = date('j/n/Y', $timeInit);?>
            			<?php $child2 = date('j/n/Y', $timeEnd);?>
					<?php echo $child1;?> - <?php echo $child2;?> 			  
				  <?php }else{?>
				  <span>--</span>
				  <?php } ?>
				  </td>
                </tr>      
			<?php endforeach?>			  				
              </tbody>	
            </table>  
			<span class="mini">*Ketetapan Mengenai Durasi dan Pembimbing Lab bisa berubah kapan saja.</span><br/>	<br/>
			<?php if($dataSekolah->file_surat_balasan != NULL){?>
				<div class="form-group">				
				<label>File Surat Balasan Balasan : <?php echo $dataSekolah->file_surat_balasan;?></label>	<br/>
				<a class="btn btn-primary" href="<?php echo site_url('Pengajuan/downloadBalasan/'.$dataSekolah->file_surat_balasan);?>">Unduh</a>
				</div>				
			<?php } ?>
          </div>   
			<div class="form-group">				
        <div class="row align-center">
				<center><a class="btn btn-primary" href="<?php echo base_url(); ?>index.php/Home/index">Kembali ke Homepage</a></center>
        <center><a class="btn btn-primary" href="<?php echo base_url(); ?>index.php/CekStatus/index">Kembali ke Cek Status</a></center>
        </div>
			</div>
		</form>			
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