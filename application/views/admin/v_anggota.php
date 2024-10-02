
<div id="content">

        
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          
          

        </nav>
        
<div class="container-fluid">

         
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"><?php echo isset($breadcrumb) ? $breadcrumb : ''; ?></h6>
            </div>
            <div class="card-body">
                
            <div class="box-header">
              <a href="" class="btn btn-success btn-flat" data-toggle="modal" data-target="#myModal"><span class="fa fa-plus"></span> Tambah Data anggota</a>
            </div><br>
                
            <div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Photo</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Prodi</th>
                <th>Jenis Kelamin</th>
                <th>Angkatan</th>
                <th>Bidang</th>
                <th style="text-align:right;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $no = 0;
                foreach ($data->result_array() as $i) :
                    $no++;
                    $id = $i['anggota_id'];
                    $nim = $i['anggota_nim'];
                    $nama = $i['anggota_nama'];
                    $jenkel = $i['anggota_jenkel'];
                    $prodi = $i['anggota_prodi'];
                    $angkatan = $i['anggota_angkatan'];
                    $bidang = $i['anggota_bidang'];
                    $photo = $i['anggota_photo'];
            ?>
            <tr>
                <td>
                    <?php if(empty($photo)): ?>
                        <img class="img-thumbnail" src="<?php echo base_url().'assets/images/user_blank.png';?>" alt="No Photo">
                    <?php else: ?>
                        <img class="img-thumbnail" src="<?php echo base_url().'assets/images/'.$photo;?>" alt="Photo">
                    <?php endif; ?>
                </td>
                <td><?php echo $nim; ?></td>
                <td><?php echo $nama; ?></td>
                <td><?php echo $prodi; ?></td>
                <td>
                    <?php echo ($jenkel == 'L') ? 'Laki-Laki' : 'Perempuan'; ?>
                </td>
                <td><?php echo $angkatan; ?></td>
                <td><?php echo $bidang; ?></td>
                <td style="text-align:right;">
                    <a href="#" class="btn btn-info btn-icon-split" data-toggle="modal" data-target="#ModalEdit<?php echo $id;?>">
                        <span class="icon text-white-50">
                            <i class="fas fa-info-circle"></i>
                        </span>
                        <span class="text">Edit</span>
                    </a>
                    <a href="#" class="btn btn-danger btn-icon-split" data-toggle="modal" data-target="#ModalHapus<?php echo $id;?>">
                        <span class="icon text-white-50">
                            <i class="fas fa-trash"></i>
                        </span>
                        <span class="text">Hapus</span>
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

                
                  
              </div>
            </div>
          </div>

        </div>
   
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel">Add anggota</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'admin/anggota/simpan_anggota'?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">

                                    <div class="form-group">
                                        <label for="inputUserName" class="col-sm-4 control-label">NIM</label>
                                        <div class="col-sm-7">
                                            <input type="text" name="xnim" class="form-control" id="inputUserName" placeholder="NIM" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputUserName" class="col-sm-4 control-label">Nama Anggota</label>
                                        <div class="col-sm-7">
                                            <input type="text" name="xnama" class="form-control" id="inputUserName" placeholder="Nama" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputUserName" class="col-sm-4 control-label">Jenis Kelamin</label>
                                        <div class="col-sm-7">
                                           <div class="radio radio-info radio-inline">
                                                <input type="radio" id="inlineRadio1" value="L" name="xjenkel" checked>
                                                <label for="inlineRadio1"> Laki-Laki </label>
                                            </div>
                                            <div class="radio radio-info radio-inline">
                                                <input type="radio" id="inlineRadio1" value="P" name="xjenkel">
                                                <label for="inlineRadio2"> Perempuan </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputUserName" class="col-sm-4 control-label">Prodi</label>
                                        <div class="col-sm-7">
                                            <input type="text" name="xprodi" class="form-control" id="inputUserName" placeholder="Contoh: Teknologi Informasi" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputUserName" class="col-sm-4 control-label">Angkatan</label>
                                        <div class="col-sm-7">
                                            <input type="text" name="xangkatan" class="form-control" id="inputUserName" placeholder="Contoh: Angkatan 2023" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputUserName" class="col-sm-4 control-label">Bidang Keahlian</label>
                                        <div class="col-sm-7">
                                            <input type="text" name="xbidang" class="form-control" id="inputUserName" placeholder="Contoh: Jaringan, Cybersecurity" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputUserName" class="col-sm-4 control-label">Photo</label>
                                        <div class="col-sm-7">
                                            <input type="file" name="filefoto"/>
                                        </div>
                                    </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-flat" id="simpan">Simpan</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    
    
<?php foreach ($data->result_array() as $i) :
              $id=$i['anggota_id'];
              $nim=$i['anggota_nim'];
              $nama=$i['anggota_nama'];
              $jenkel=$i['anggota_jenkel'];
              $prodi=$i['anggota_prodi'];
              $angkatan=$i['anggota_angkatan'];
              $bidang=$i['anggota_bidang'];
              $photo=$i['anggota_photo'];
            ?>

        <div class="modal fade" id="ModalEdit<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel">Edit anggota</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'admin/anggota/update_anggota'?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                                <input type="hidden" name="kode" value="<?php echo $id;?>"/>
                                <input type="hidden" value="<?php echo $photo;?>" name="gambar">
                                    <div class="form-group">
                                        <label for="inputUserName" class="col-sm-4 control-label">NIM</label>
                                        <div class="col-sm-7">
                                            <input type="text" name="xnim" value="<?php echo $nim;?>" class="form-control" id="inputUserName" placeholder="nim" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputUserName" class="col-sm-4 control-label">Nama</label>
                                        <div class="col-sm-7">
                                            <input type="text" name="xnama" value="<?php echo $nama;?>" class="form-control" id="inputUserName" placeholder="Nama" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
    <label for="inputUserName" class="col-sm-4 control-label">Angkatan</label>
    <div class="col-sm-7">
        <input type="text" name="xangkatan" value="<?php echo $angkatan;?>" class="form-control" id="inputUserName" placeholder="Angkatan" required>
    </div>
</div>

                                    <div class="form-group">
                                        <label for="inputUserName" class="col-sm-4 control-label">Prodi</label>
                                        <div class="col-sm-7">
                                            <input type="text" name="xprodi" value="<?php echo $prodi;?>" class="form-control" id="inputUserName" placeholder="Tempat Lahir" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputUserName" class="col-sm-4 control-label">Angkatan</label>
                                        <div class="col-sm-7">
                                            <input type="text" name="xangkatan" value="<?php echo $angkatan;?>" class="form-control" id="inputUserName" placeholder="Contoh: 25 September 1993" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputUserName" class="col-sm-4 control-label">Bidang</label>
                                        <div class="col-sm-7">
                                            <input type="text" name="xbidang" value="<?php echo $bidang;?>" class="form-control" id="inputUserName" placeholder="Contoh: PPKN, Matematika" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputUserName" class="col-sm-4 control-label">Photo</label>
                                        <div class="col-sm-7">
                                            <input type="file" name="filefoto"/>
                                        </div>
                                    </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-flat" id="simpan">Simpan</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
  <?php endforeach;?>

    
    <?php foreach ($data->result_array() as $i) :
              $id=$i['anggota_id'];
              $nim=$i['anggota_nim'];
              $nama=$i['anggota_nama'];
              $jenkel=$i['anggota_jenkel'];
              $prodi=$i['anggota_prodi'];
              $angkatan=$i['anggota_angkatan'];
              $bidang=$i['anggota_bidang'];
              $photo=$i['anggota_photo'];
            ?>
	<!--Modal Hapus Pengguna-->
        <div class="modal fade" id="ModalHapus<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel">Hapus anggota</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'admin/anggota/hapus_anggota'?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
							       <input type="hidden" name="kode" value="<?php echo $id;?>"/>
                     <input type="hidden" value="<?php echo $photo;?>" name="gambar">
                            <p>Apakah Anda yakin mau menghapus anggota <b><?php echo $nama;?></b> ?</p>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-flat" id="simpan">Hapus</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
	<?php endforeach;?>
    
    
<?php if($this->session->flashdata('msg')=='error'):?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Error',
                    text: "Password dan Ulangi Password yang Anda masukan tidak sama.",
                    showHideTransition: 'slide',
                    icon: 'error',
                    hideAfter: false,
                    position: 'bottom-right',
                    bgColor: '#FF4859'
                });
        </script>

    <?php elseif($this->session->flashdata('msg')=='success'):?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Success',
                    text: "anggota Berhasil disimpan ke database.",
                    showHideTransition: 'slide',
                    icon: 'success',
                    hideAfter: false,
                    position: 'bottom-right',
                    bgColor: '#7EC857'
                });
        </script>
    <?php elseif($this->session->flashdata('msg')=='info'):?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Info',
                    text: "anggota berhasil di update",
                    showHideTransition: 'slide',
                    icon: 'info',
                    hideAfter: false,
                    position: 'bottom-right',
                    bgColor: '#00C9E6'
                });
        </script>
    <?php elseif($this->session->flashdata('msg')=='success-hapus'):?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Success',
                    text: "anggota Berhasil dihapus.",
                    showHideTransition: 'slide',
                    icon: 'success',
                    hideAfter: false,
                    position: 'bottom-right',
                    bgColor: '#7EC857'
                });
        </script>
    <?php else:?>

    <?php endif;?>