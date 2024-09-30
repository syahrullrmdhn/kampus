<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_informasi extends CI_Model {

    public function get_perkuliahan() {
        $query = $this->db->get('tbl_perkuliahan'); // Ganti dengan nama tabel yang sesuai
        return $query->result(); // Mengembalikan hasil sebagai array objek
    }
}
