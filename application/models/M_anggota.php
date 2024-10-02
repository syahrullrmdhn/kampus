<?php 
class M_anggota extends CI_Model{

	function get_all_anggota(){
		$hsl=$this->db->query("SELECT * FROM tbl_anggota");
		return $hsl;
	}

	function simpan_anggota($nim,$nama,$jenkel,$prodi,$angkatan,$bidang,$photo){
		$hsl=$this->db->query("INSERT INTO tbl_anggota (anggota_nim,anggota_nama,anggota_jenkel,anggota_prodi,anggota_angkatan,anggota_bidang,anggota_photo) VALUES ('$nim','$nama','$jenkel','$prodi','$angkatan','$bidang','$photo')");
		return $hsl;
	}
	function simpan_anggota_tanpa_img($nim,$nama,$jenkel,$prodi,$angkatan,$bidang){
		$hsl=$this->db->query("INSERT INTO tbl_anggota (anggota_nim,anggota_nama,anggota_jenkel,anggota_prodi,anggota_angkatan,anggota_bidang) VALUES ('$nim','$nama','$jenkel','$prodi','$angkatan','$bidang')");
		return $hsl;
	}

	function update_anggota($kode,$nim,$nama,$jenkel,$prodi,$angkatan,$bidang,$photo){
		$hsl=$this->db->query("UPDATE tbl_anggota SET anggota_nim='$nim',anggota_nama='$nama',anggota_jenkel='$jenkel',anggota_prodi='$prodi',anggota_angkatan='$angkatan',anggota_bidang='$bidang',anggota_photo='$photo' WHERE anggota_id='$kode'");
		return $hsl;
	}
	function update_anggota_tanpa_img($kode,$nim,$nama,$jenkel,$prodi,$angkatan,$bidang){
		$hsl=$this->db->query("UPDATE tbl_anggota SET anggota_nim='$nim',anggota_nama='$nama',anggota_jenkel='$jenkel',anggota_prodi='$prodi',anggota_angkatan='$angkatan',anggota_bidang='$bidang' WHERE anggota_id='$kode'");
		return $hsl;
	}
	function hapus_anggota($kode){
		$hsl=$this->db->query("DELETE FROM tbl_anggota WHERE anggota_id='$kode'");
		return $hsl;
	}

	//front-end
	function anggota(){
		$hsl=$this->db->query("SELECT * FROM tbl_anggota");
		return $hsl;
	}
	function anggota_perpage($offset,$limit){
		$hsl=$this->db->query("SELECT * FROM tbl_anggota limit $offset,$limit");
		return $hsl;
	}

}