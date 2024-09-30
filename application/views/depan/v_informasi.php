<div class="recent_event_area section__padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <div class="section_title text-center mb-70">
                    <h3 class="mb-45">INFORMASI PERKULIAHAN ONLINE</h3>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table class="table table-striped" id="display">
                    <thead>
    <tr>
        <th>No</th>
        <th>Mata Kuliah</th>
        <th>Dosen</th>
        <th>Prodi</th>
        <th>Waktu Mulai</th>
        <th>Waktu Selesai</th>
        <th>Status</th>
        <th style="text-align:right;">Link Zoom</th>
    </tr>
</thead>
<tbody>
    <?php
    $no = 1;
    $current_time = date('Y-m-d H:i:s'); // Waktu saat ini

    foreach ($data as $row):
        $start_time = $row->start_time; // Kolom waktu mulai dari tabel Anda
        $end_time = $row->end_time;     // Kolom waktu selesai dari tabel Anda

        // Cek status kelas berdasarkan waktu saat ini
        if ($current_time < $start_time) {
            $status = "Dimulai pada " . date('d-m-Y H:i', strtotime($start_time));
        } elseif ($current_time >= $start_time && $current_time <= $end_time) {
            $status = "Sedang Berlangsung";
        } else {
            // Jika waktu saat ini melebihi waktu selesai, tambah 7 hari ke start_time dan end_time
            $new_start_time = date('Y-m-d H:i:s', strtotime($start_time . ' + 7 days'));
            $new_end_time = date('Y-m-d H:i:s', strtotime($end_time . ' + 7 days'));

            // Update status menjadi "Selesai", tetapi menampilkan waktu kelas berikutnya
            $status = "Selesai - Akan Dimulai Kembali pada " . date('d-m-Y H:i', strtotime($new_start_time));
            
            // Set waktu mulai dan selesai untuk minggu berikutnya
            $start_time = $new_start_time;
            $end_time = $new_end_time;
        }
    ?>
    <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $row->mata_kuliah; ?></td>
        <td><?php echo $row->dosen; ?></td>
        <td><?php echo $row->prodi; ?></td>
        <td><?php echo date('d-m-Y H:i', strtotime($start_time)); ?></td>
        <td><?php echo date('d-m-Y H:i', strtotime($end_time)); ?></td>
        <td><?php echo $status; ?></td>
        <td style="text-align:right;">
            <a href="<?php echo $row->link_zoom; ?>" class="btn btn-info" target="_blank">Masuk Zoom</a>
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
