<?php
class Anggota extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        };
		$this->load->model('m_anggota');
		$this->load->model('m_pengguna');
		$this->load->library('upload');
	}


	function index(){
        
		$this->data['data']=$this->m_anggota->get_all_anggota();
        
        $this->data['breadcrumb']  = 'Data anggota';
            
        $this->data['main_view']   = 'admin/v_anggota';
            
        $this->load->view('theme/admintemplate',$this->data);
        
		
        
	}
	
	function simpan_anggota(){
				$config['upload_path'] = './assets/images/'; //path folder
	            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
	            $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

	            $this->upload->initialize($config);
	            if(!empty($_FILES['filefoto']['name']))
	            {
	                if ($this->upload->do_upload('filefoto'))
	                {
	                        $gbr = $this->upload->data();
	                        //Compress Image
	                        $config['image_library']='gd2';
	                        $config['source_image']='./assets/images/'.$gbr['file_name'];
	                        $config['create_thumb']= FALSE;
	                        $config['maintain_ratio']= FALSE;
	                        $config['quality']= '60%';
	                        $config['width']= 300;
	                        $config['height']= 300;
	                        $config['new_image']= './assets/images/'.$gbr['file_name'];
	                        $this->load->library('image_lib', $config);
	                        $this->image_lib->resize();

	                        $photo=$gbr['file_name'];
							$nip=strip_tags($this->input->post('xnip'));
							$nama=strip_tags($this->input->post('xnama'));
							$jenkel=strip_tags($this->input->post('xjenkel'));
							$prodi=strip_tags($this->input->post('xprodi'));
							$angkatan=strip_tags($this->input->post('xangkatan'));
							$bidang=strip_tags($this->input->post('xbidang'));

							$this->m_anggota->simpan_anggota($nip,$nama,$jenkel,$prodi,$angkatan,$bidang,$photo);
							echo $this->session->set_flashdata('msg','success');
							redirect('admin/anggota');
					}else{
	                    echo $this->session->set_flashdata('msg','warning');
	                    redirect('admin/anggota');
	                }
	                 
	            }else{
	            	$nip=strip_tags($this->input->post('xnip'));
					$nama=strip_tags($this->input->post('xnama'));
					$jenkel=strip_tags($this->input->post('xjenkel'));
					$prodi=strip_tags($this->input->post('xprodi'));
					$angkatan=strip_tags($this->input->post('xangkatan'));
					$bidang=strip_tags($this->input->post('xbidang'));

					$this->m_anggota->simpan_anggota_tanpa_img($nip,$nama,$jenkel,$prodi,$angkatan,$bidang);
					echo $this->session->set_flashdata('msg','success');
					redirect('admin/anggota');
				}
				
	}
	
	function update_anggota(){
				
	            $config['upload_path'] = './assets/images/'; //path folder
	            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
	            $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

	            $this->upload->initialize($config);
	            if(!empty($_FILES['filefoto']['name']))
	            {
	                if ($this->upload->do_upload('filefoto'))
	                {
	                        $gbr = $this->upload->data();
	                        //Compress Image
	                        $config['image_library']='gd2';
	                        $config['source_image']='./assets/images/'.$gbr['file_name'];
	                        $config['create_thumb']= FALSE;
	                        $config['maintain_ratio']= FALSE;
	                        $config['quality']= '60%';
	                        $config['width']= 300;
	                        $config['height']= 300;
	                        $config['new_image']= './assets/images/'.$gbr['file_name'];
	                        $this->load->library('image_lib', $config);
	                        $this->image_lib->resize();
	                        $gambar=$this->input->post('gambar');
							$path='./assets/images/'.$gambar;
							unlink($path);

	                        $photo=$gbr['file_name'];
	                        $kode=$this->input->post('kode');
							$nip=strip_tags($this->input->post('xnip'));
							$nama=strip_tags($this->input->post('xnama'));
							$jenkel=strip_tags($this->input->post('xjenkel'));
							$prodi=strip_tags($this->input->post('xprodi'));
							$angkatan=strip_tags($this->input->post('xangkatan'));
							$bidang=strip_tags($this->input->post('xbidang'));

							$this->m_anggota->update_anggota($kode,$nip,$nama,$jenkel,$prodi,$angkatan,$bidang,$photo);
							echo $this->session->set_flashdata('msg','info');
							redirect('admin/anggota');
	                    
	                }else{
	                    echo $this->session->set_flashdata('msg','warning');
	                    redirect('admin/anggota');
	                }
	                
	            }else{
							$kode=$this->input->post('kode');
							$nip=strip_tags($this->input->post('xnip'));
							$nama=strip_tags($this->input->post('xnama'));
							$jenkel=strip_tags($this->input->post('xjenkel'));
							$prodi=strip_tags($this->input->post('xprodi'));
							$angkatan=strip_tags($this->input->post('xangkatan'));
							$bidang=strip_tags($this->input->post('xbidang'));
							$this->m_anggota->update_anggota_tanpa_img($kode,$nip,$nama,$jenkel,$prodi,$angkatan,$bidang);
							echo $this->session->set_flashdata('msg','info');
							redirect('admin/anggota');
	            } 

	}

	function hapus_anggota(){
		$kode=$this->input->post('kode');
		$gambar=$this->input->post('gambar');
		$path='./assets/images/'.$gambar;
		unlink($path);
		$this->m_anggota->hapus_anggota($kode);
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('admin/anggota');
	}

}