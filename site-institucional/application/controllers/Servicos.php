<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Servicos extends CI_Controller {

	public function index()
	{
		$data['title'] = "LCI | Serviços";
		$data['description'] = "Informações sobre os serviços prestados";
		
		$this->load->view('commons/header',$data);
		$this->load->view('servicos');
		$this->load->view('commons/footer');
	}
}
