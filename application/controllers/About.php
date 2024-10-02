<?php
class About extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->model('m_pengunjung');
        $this->m_pengunjung->count_visitor();
        // Load the model for fetching about content
        $this->load->model('M_about');
    }

    function index() {
        // Get the total counts as before
        $this->data['tot_anggota'] = $this->db->get('tbl_anggota')->num_rows();
        $this->data['tot_siswa'] = $this->db->get('tbl_siswa')->num_rows();
        $this->data['tot_files'] = $this->db->get('tbl_files')->num_rows();
        $this->data['tot_agenda'] = $this->db->get('tbl_agenda')->num_rows();

        // Fetch the latest about content from the database
        $this->data['about'] = $this->M_about->get_about_content();

        // Set the main view to display the content from the about page
        $this->data['main_view'] = 'depan/v_about';

        // Load the template with the populated data
        $this->load->view('theme/template', $this->data);
    }
}
