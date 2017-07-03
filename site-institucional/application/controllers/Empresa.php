<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Empresa extends CI_Controller {

	public function index()
	{
		$data['title'] = "LCI | Empresa";
		$data['description'] = "Informações sobre a empresa";
		
		$this->load->view('commons/header', $data);
		$this->load->view('empresa', $data);
		$this->load->view('commons/footer');
	}
}
