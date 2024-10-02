<?php
class About extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->model('M_about'); // Load the model for about
        $this->load->library('session');
    }
    
    function index() {
        $data['breadcrumb'] = "About Us Management"; 
        $data['data'] = $this->M_about->get_all_about(); // Retrieve all about data from the database
        
        $this->load->view('admin/v_about', $data); // Load the view for about
    }

    function simpan_about() {
        $judul = $this->input->post('title'); // Adjusted to match the form field names
        $tanggal = $this->input->post('date');
        $waktu = $this->input->post('time');
        $lokasi = $this->input->post('location');
        $konten = $this->input->post('content');
        $author = $this->session->userdata('username'); // Retrieve username from session

        // Handle image upload
        $image = $_FILES['image']['name'];
        $config['upload_path'] = './assets/images/about/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('image')) {
            $image = $this->upload->data('file_name'); // Get the uploaded file name
        } else {
            $image = ''; // Handle case where no image is uploaded
        }

        $this->M_about->simpan_about($judul, $konten, $author, $tanggal, $waktu, $lokasi, $image);
        redirect('admin/about');
    }

    function update_about() {
        $id = $this->input->post('id'); // Adjusted to match form field names
        $judul = $this->input->post('title');
        $tanggal = $this->input->post('date');
        $waktu = $this->input->post('time');
        $lokasi = $this->input->post('location');
        $konten = $this->input->post('content');

        // Handle image upload
        if (!empty($_FILES['image']['name'])) {
            $image = $_FILES['image']['name'];
            $config['upload_path'] = './assets/images/about/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image')) {
                $image = $this->upload->data('file_name'); // Get the uploaded file name
            }
        } else {
            $image = ''; // Handle case where no new image is uploaded
        }

        $this->M_about->update_about($id, $judul, $konten, $tanggal, $waktu, $lokasi, $image);
        redirect('admin/about');
    }

    function hapus_about() {
        $id = $this->input->post('id'); // Adjusted to match form field names
        $this->M_about->hapus_about($id);
        redirect('admin/about');
    }
}