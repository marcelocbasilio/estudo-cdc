<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Institucional extends CI_Controller {

	public function index()
	{
		$this->output->cache(1440); //tempo em minutos correspondente a 24 horas.
		$data['title'] = "LCI | Home";
		$data['description'] = "Exercício de exemplo do capítulo 5 do livro CodeIgniter";
		$this->load->view('home',$data);
	}
}
