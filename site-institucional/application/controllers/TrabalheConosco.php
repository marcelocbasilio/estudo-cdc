<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TrabalheConosco extends CI_Controller {

	public function index()
	{
		$data['title'] = "LCI | Trabalhe Conosco";
		$data['description'] = "Informações sobre como trabalhar na empresa";
		
		$this->load->view('commons/header', $data);
		$this->load->view('trabalhe-conosco',$data);
		$this->load->view('commons/footer');
	}
}
