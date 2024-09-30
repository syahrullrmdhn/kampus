<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Informasi extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_informasi'); // Load model
    }

	function index(){
        
        $this->data['main_view']   = 'depan/v_informasi';
        
		$this->data['data']=$this->M_informasi->get_perkuliahan();
        
		$this->load->view('theme/template',$this->data);
        
	}
}