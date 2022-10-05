<!DOCTYPE html>
<html lang="en">
<!-- alamat gambar F:\uploads\picture\help -->
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">    

    <title>Panduan Penggunaan &nbsp|&nbsp Sistem Informasi Praktik Kerja Industri</title>

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
  <div class="page-header header-filter" data-parallax="true" style="background-image: url('assets/img/bg3.jpg')">
    <div class="container">
      <div class="row">
        <div class="col-md-6">          
            <h1 class="title">Panduan Penggunaan</h1>
            <h4></h4>          
        </div>
      </div>
    </div>
  </div>
  <div class="main norma">
    <div class="container">
	<div class="section text-center">              
        <nav class="navbar navbar-expand-lg bg-primary">
              <div class="container">
                <div class="navbar-translate">
                  <a class="navbar-brand" href="#">Menu Panduan</a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="navbar-toggler-icon"></span>
                    <span class="navbar-toggler-icon"></span>
                    <span class="navbar-toggler-icon"></span>
                  </button>
                </div>
                <div class="collapse navbar-collapse">
                  <ul class="navbar-nav">
                    <li class="nav-item">
                      <a href="#Pengajuan" class="nav-link">Pengajuan Praktik Kerja Industri</a>
                    </li>
                    <li class="nav-item">
                      <a href="#CekStatus" class="nav-link">Cek Status</a>
                    </li>
                    <li class="nav-item">
                      <a href="#Pantau" class="nav-link">Pantau Siswa</a>
                    </li>					
                  </ul>
                </div>
              </div>
            </nav>
			</div>
			</div>
			<div class="container">
			<h3 id="Pengajuan">Pengajuan Praktik Kerja Industri</h3>
			<p class="text-info text-justify">
			Halaman beranda menampilkan informasi lowongan seperti jumlah peminat 
			dan jumlah peminat yang akan diterima. 
			Di kotak laboratorium, terdapat tautan "Ajukan" 
			dan tautan ini digunakan untuk mengajukan pengajuan.
			</p>
			<p class="text-justify">
			Di tautan daftar peminat, hanya menampilkan daftar siswa yang mendaftar di saat lowongan terbuka…jadi bisa saja hanya menampilkan siswa yang sudah diterima saja.
			</p>
			<p class="text-justify">
			Di tautan ajukan, laman akan menampilkan form yang harus diisi. Pertama harus mengisi data sekolah, kemudian data guru pembimbing dan data siswa yang akan diajukan. Untuk data siswa boleh mengisi satu orang dan paling banyak tiga orang saja. Jadi..jika hendak mengisi lebih dari tiga orang untuk laboratoium yang sama, anda harus mengajukan formulir kedua. 
			</p>
			<p class="text-justify">
			Setelah formulir diisi, anda akan dialihkan ke laman verifikasi dimana seluruh data yang diisi sebelumnya akan muncul. Dan ada sebuah form yang menampilkan klik disini untuk mengunggah file surat pengajuan. Meskipun terlihat tidak ada perubahan, tapi file sudah masuk setelah di klik dan dipilih file-nya. Kemudian klik ajukan lalu klik iya untuk mengirimkan pengajuan.
			</p>
			<p class="text-justify">
			Jika berhasil maka anda akan dialihkan ke laman selesai yang menampilkan kode pembimbing yang nanti bisa dipakai untuk memantau prakerin dan mengecek status apakah pengajuan diterima atau belum…
			</p>
			<a href="#awal" class="btn btn-info">Kembali ke atas</a>
		</div>
		<div class="container">
			<h3 id="CekStatus">Cek Status</h3>
			<p class="text-info text-justify">
			Untuk mengecek status pengajuan, anda cukup memasukkan kode pembimbing.
			</p>
			<p class="text-justify">
			Kemudian tekan ENTER atau klik cek status.
			</p>
			<p class="text-justify">
			Jika berhasil maka akan menampilkan laman di bawah ini…
			</p>
			<p class="text-justify">
			Jika sudah diproses maka akan menampilkan tombol unduh file surat balasan dari pihak Departemen Pendidikan Ilmu Komputer. Selain itu, di bawahnya terdapat perubahan pada kolom seperti gambar …
			</p>
			<p class="text-justify">
			Jika siswa diterima akan menampilkan pesan <span class="text-success">diterima</span> dan mendapatkan kode aktivasi akun siswa serta durasi prakerin yang nanti dipakai untuk sisi_siswa. 
			Jika ditolak maka hanya menampilkan pesan <span class="text-danger">ditolak</span>.
			</p>
			<a href="#awal" class="btn btn-info">Kembali ke atas</a>
		</div>
		<div class="container">
			<h3 id="Pantau">Pantau Siswa</h3>
			<p class="text-info text-justify">
			Ada beberapa fitur dalam pemantauan siswa, pertama mengacc absen dan mengacc catatan kegiatan.
			</p>
			<p class="text-justify">
			Kedua fitur ini bisa diakses dengan memasukkan kode pembimbing, namun hanya bisa dilakukan sesudah surat diproses dan ada siswa yang diterima. 
			</p>
			<p class="text-justify">
			Untuk mengecek absen, masukkan kode pembimbing ke laman “cek aktivitas siswa”. Setelah berhasil, klik tab absensi untuk mengabsen. Tab pertama menampilkan daftar siswa yang diterima dan disini bisa dipantau apakah akunnya diaktifkan atau tidak. Di tab absensi, klik acc absen di tanggal absen tertentu jika ingin mengonfirmasi kehadiran. Selain itu absen bisa dibatalkan jika sudah di klik batalkan acc. 
			</p>
			<p class="text-justify">
			Untuk mengecek catatan kegiatan siswa, klik tab catatan kegiatan dan disitu menampilkan catatan dari semua siswa yang berada di dalam kolom tersebut. Sama seperti tab absensi, cukup klik acc saja jika ingin menerima, namun jika penasaran bisa mengklik isi catatan kegiatan. Sehingga menampilkan seperti ini. Untuk mengacc hanya bisa di laman utama.
			</p>
			<p class="text-justify">
			Jika sudah selesai klik log out di menu dekat panduan. Tombol ini akan muncul jika masuk ke laman cek aktivitas siswa. 
			</p>
			<a href="#awal" class="btn btn-info">Kembali ke atas</a>
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
