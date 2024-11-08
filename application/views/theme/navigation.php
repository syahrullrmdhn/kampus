<div id="sticky-header" class="main-header-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="header_wrap d-flex justify-content-between align-items-center">
                            <div class="header_left">
    <div class="logo">
        <a href="<?php echo base_url('');?>">
            <img src="<?php echo base_url('');?>style/img/logo.jpeg" alt="" class="img-fluid logo-img">
        </a>
    </div>
</div>

<style>
    .logo-img {
        max-width: 100%; /* Membuat gambar responsif */
        height: auto; /* Mempertahankan rasio aspek */
    }

    @media (max-width: 576px) {
        .logo-img {
            max-width: 100px; /* Menetapkan ukuran maksimum untuk perangkat mobile */
        }
    }

    @media (min-width: 576px) and (max-width: 768px) {
        .logo-img {
            max-width: 120px; /* Ukuran maksimum untuk tablet */
        }
    }

    @media (min-width: 768px) {
        .logo-img {
            max-width: 150px; /* Ukuran maksimum untuk desktop */
        }
    }
</style>

                                <div class="header_right d-flex align-items-center">
                                    <div class="main-menu  d-none d-lg-block">
                                        <nav>
                                            <ul id="navigation">
                                                <li><a  href="<?php echo base_url('');?>">home</a></li>                                                
                                                <li><a href="#">Profile <i class="ti-angle-down"></i></a>
                                                    <ul class="submenu">
                                                        <li><a href="<?php echo site_url('about');?>">Tentang</a></li>
                                                        <li><a href="<?php echo site_url('anggota');?>">Anggota</a></li>
                                                        
                                                        <!-- <li><a href="<?php echo site_url('guru');?>">Daftar Guru</a></li>
                                                        <li><a href="<?php echo site_url('contact');?>">Kontak Kami</a></li> -->
                                                    </ul>
                                                </li>
                                                <li><a href="#">Akademik <i class="ti-angle-down"></i></a>
                                                    <ul class="submenu">
                                                        <li><a href="<?php echo site_url('pengumuman');?>">Pengumuman</a></li>
                                                        
                                                        <li><a href="<?php echo site_url('agenda');?>">Agenda</a></li>
                                                        <li><a href="<?php echo site_url('galeri');?>">Galeri</a></li>
                                                    </ul>
                                                </li>
                                                
                                                
                                                
                                                <li><a href="<?php echo site_url('informasi');?>">Jadwal Perkuliahan</a></li>
                                                <li><a href="<?php echo site_url('download');?>">Download</a></li>
                                                <li><a href="<?php echo site_url('blog');?>">Berita</a></li>
                                                <li><a href="<?php echo site_url('video');?>">Video Belajar</a></li>
                                            </ul>
                                        </nav>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>