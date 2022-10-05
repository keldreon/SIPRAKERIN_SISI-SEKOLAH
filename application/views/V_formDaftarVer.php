<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <meta name="description" content="">
    <meta name="author" content=""> 
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Verifikasi Formulir Pengajuan <?php echo $laboratorium->nama_lab;?> | Sistem Informasi Praktik Kerja Industri</title>
	<link href="<?php echo base_url("assets/css/material-kit.css?v=2.0.4"); ?>" rel="stylesheet" type="text/css" />	
	<link href="<?php echo base_url("assets/css/custom.css"); ?>" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
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
            <h1 class="title">Formulir Pengajuan <?php echo $laboratorium->nama_lab;?>
			</h1>            
			Tahap (2 dari 2) Pengunggahan Surat Permintaan Pengajuan.
        </div>
      </div>
    </div>
  </div>
<div class="main main-raised norma">
<div class="section section-basic">
    <div class="container">
	<div class="row">
	<div class="col-md-12 col-md-offset-2 well">      
	<?php $attributes = array("name" => "signupform","id"=>"signupform");
			echo form_open_multipart("Pengajuan/kirimProposal", $attributes);?>
		<?php echo $this->session->flashdata('msg'); ?>      
	  <legend class"title">Data Sekolah</legend>			
			<div class="form-group">				
				<input class="form-control" name="nSekolah" placeholder="Nama Sekolah" type="text" value="<?php echo set_value('nSekolah'); ?>" readonly/>
				<span class="text-danger"><?php echo form_error('nSekolah'); ?></span>
			</div>						
			
			<div class="form-group">				
				<input class="form-control" name="aSekolah" placeholder="Alamat Sekolah" type="text" value="<?php echo set_value('aSekolah'); ?>" readonly/>
				<span class="text-danger"><?php echo form_error('aSekolah'); ?></span>
			</div>			

			<div class="form-group">				
				<input class="form-control" name="contSekolah" placeholder="No. Telp/HP" type="text" value="<?php echo set_value('contSekolah'); ?>" readonly/>
				<span class="text-danger"><?php echo form_error('contSekolah'); ?></span>
			</div>
			<br/>
			
			<div class="input-group">
			<div class="custom-file" id="customFile" lang="en">											
					<input type="file" class=" custom-file-input" id="exampleInputFile" aria-describedby="fileHelp" name="userfile">
					<label class="custom-file-label" id="exampleInputFile">Klik disini untuk memilih file...<span class="text-info">*file yang diterima dalam format .pdf, .doc, dan .docx.</span></label>
			</div>			
			</div>											
			<br/>
			
			<legend>Data Pembimbing Sekolah</legend>			
			<div class="form-group">				
				<input class="form-control" name="nPembimbing" placeholder="Nama Pembimbing" type="text" value="<?php echo set_value('nPembimbing'); ?>" readonly/>
				<span class="text-danger"><?php echo form_error('nPembimbing'); ?></span>
			</div>
			
			<div class="form-group">				
				<input class="form-control" name="pJabatan" placeholder="Jabatan" type="text" value="<?php echo set_value('pJabatan'); ?>" readonly/>
				<span class="text-danger"><?php echo form_error('pJabatan'); ?></span>
			</div>

			<div class="form-group">			
				<input class="form-control" name="pKontak" placeholder="No. Telp/HP Pembimbing" type="text" value="<?php echo set_value('pKontak'); ?>" readonly/>
				<span class="text-danger"><?php echo form_error('pKontak'); ?></span>
			</div>
			
			<div class="form-group">				
				<input class="form-control" name="pEmail" placeholder="Email Pembimbing" type="text" value="<?php echo set_value('pEmail'); ?>" readonly/>
				<span class="text-danger"><?php echo form_error('pEmail'); ?></span>
			</div>
			<br/>
			<div class="form-group">
			<legend class=:"title">Siswa</legend>			
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>                  
                  <th>NIS</th>
                  <th>Nama</th>
                  <th>Jurusan</th>				  
                </tr>
              </thead>
              <tbody>
                <tr>                  
                  <td><input class="form-control" name="nis1" placeholder="NIS" type="text" value="<?php echo set_value('nis1'); ?>" readonly/>
				<span class="text-danger"><?php echo form_error('nis1'); ?></span></td>
                  <td><input class="form-control" name="nSiswa1" placeholder="Nama" type="text" value="<?php echo set_value('nSiswa1'); ?>" readonly/>
				<span class="text-danger"><?php echo form_error('nSiswa1'); ?></span></td>
                  <td><input class="form-control" name="nJurusan1" placeholder="Jurusan" type="text" value="<?php echo set_value('nJurusan1'); ?>" readonly/>
				<span class="text-danger"><?php echo form_error('nJurusan1'); ?></span></td>				
                </tr>
                <tr>                  
                  <td><input class="form-control" name="nis2" placeholder="NIS" type="text" value="<?php echo set_value('nis2'); ?>" readonly/>
				<span class="text-danger"><?php echo form_error('nis2'); ?></span></td>
                  <td><input class="form-control" name="nSiswa2" placeholder="Nama" type="text" value="<?php echo set_value('nSiswa2'); ?>" readonly/>
				<span class="text-danger"><?php echo form_error('nSiswa2'); ?></span></td>
                  <td><input class="form-control" name="nJurusan2" placeholder="Jurusan" type="text" value="<?php echo set_value('nJurusan2'); ?>" readonly/>
				<span class="text-danger"><?php echo form_error('nJurusan2'); ?></span></td>
                </tr>
				<tr>                  
                  <td><input class="form-control" name="nis3" placeholder="NIS" type="text" value="<?php echo set_value('nis3'); ?>" readonly/>
				<span class="text-danger"><?php echo form_error('nis3'); ?></span></td>
                  <td><input class="form-control" name="nSiswa3" placeholder="Nama" type="text" value="<?php echo set_value('nSiswa3'); ?>" readonly/>
				<span class="text-danger"><?php echo form_error('nSiswa3'); ?></span></td>
                  <td><input class="form-control" name="nJurusan3" placeholder="Jurusan" type="text" value="<?php echo set_value('nJurusan3'); ?>" readonly/>
				<span class="text-danger"><?php echo form_error('nJurusan3'); ?></span></td>
                </tr>
              </tbody>
            </table>
          </div>		
		  </div>		
			<input name="id_lab" type="hidden" value="<?php echo $laboratorium->id_lab; ?>" />
			<div class="form-group">								
				<center><a href="#" class="btn btn-primary btn-block" data-toggle="modal" data-target="#myModal">Ajukan</a></center>
			</div>			
			<!-- name="submit" type="submit"  -->
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
  <!-- Classic Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content panel-warning">
        <div class="modal-header">
          <h5 class="modal-title">Peringatan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <i class="material-icons">clear</i>
          </button>
        </div>
        <div class="modal-body">
          <p>
		  Apakah anda yakin akan menyerahkan formulir pengajuan?
		  <br/><span>Data yang dikirim <b class="text-danger">TIDAK BISA DIUBAH</b> lagi setelah dikirm.</span> 
          </p>
        </div>
        <div class="modal-footer">		  
           <a href="#" name="Submit" id="submit2" class="btn btn-danger btn-link" >Ya</a>
          <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <!--  End Modal -->

	<script src="<?php echo base_url("assets/js/core/jquery.min.js");?>"  type="text/javascript"></script>	
    <script src="<?php echo base_url("assets/js/core/popper.min.js");?>"  type="text/javascript"></script>
    <script src="<?php echo base_url("assets/js/core/jquery-slim.min.js");?>"  type="text/javascript"></script>
    <script src="<?php echo base_url("assets/js/plugins/moment.min.js"); ?>"  type="text/javascript"></script>    
    <script src="<?php echo base_url("assets/js/core/bootstrap-material-design.min.js");?>" type="text/javascript"></script>
    <script src="<?php echo base_url("assets/js/plugins/nouislider.min.js");?>" type="text/javascript"></script>
	<script src="<?php echo base_url("assets/js/material-kit.js?v=2.0.4");?>" type="text/javascript"></script>
	<script src="<?php echo base_url("assets/js/modernizr.custom.js");?>" type="text/javascript"></script>
	<script src="<?php echo base_url("assets/js/plugins/holder.min.js");?>" type="text/javascript"></script>	
	<script>
	
	$('#submit2').click(function(){
			//when the submit button in the modal is clicked, submit the form 
			$('#signupform').submit();
	});
			
	$('#exampleInputFile').on('change', function(){
		var fileName = $(this).val();
		$(this).next(' .custom-file-label').html(fileName);
	})
	</script>
</body>
</html>