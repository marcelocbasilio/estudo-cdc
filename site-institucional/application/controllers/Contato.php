<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contato extends CI_Controller {

	public function __construct() {

		parent::__construct();
		$this->load->library(array('form_validation','session'));
		$this->load->helper(array('form', 'captcha'));
	}

	public function FaleConosco() {

		$data['title'] = "LCI | Fale Conosco";
		$data['description'] = "Exercício de exemplo do capítulo 5 do livro de CodeIgniter";
		$data['formErrors'] = null;


		$this->form_validation->set_rules('nome','Nome','trim|required|min_length[3]');
		$this->form_validation->set_rules('email', 'E-mail', 'trim|required|valid_email');
		$this->form_validation->set_rules('assunto', 'Assunto', 'trim|required|min_length[5]');
		$this->form_validation->set_rules('mensagem', 'Mensagem', 'trim|required|min_length[30]');
		$this->form_validation->set_rules('captcha', 'Captcha', 'trim|required|callback_captcha_check');

		if($this->form_validation->run() == FALSE) {
			$data['formErrors'] = validation_errors();
		} else {
			$formData = $this->input->post();
			$emailStatus = $this->SendEmailToAdmin(
				$formData['email'], $formData['nome'],"marcelocbasilio@gmail.com",
				"Marcelo (Gmail)", $formData['assunto'], $formData['mensagem'],
				$formData['email'], $formData['nome']
			);

			if($emailStatus) {
				$this->session->set_flashdata('success_msg','Contato recebido com sucesso!');
			} else {
				$data['formErrors'] = "Desculpe! Não foi possível enviar seu contato. Tente novamente mais tarde!";
			}

		}

		$data['captcha_image'] = $this->GenCaptcha();
		
		$this->load->view('commons/header', $data);
		$this->load->view('fale-conosco', $data);
		$this->load->view('commons/footer');

	}

	public function TrabalheConosco() {

		$data['title'] = "LCI | Trabalhe Conosco";
		$data['description'] = "Exercício de exemplo do capítulo 5 do livro de CodeIgniter";
		$data['formErrors'] = null;

		$this->form_validation->set_rules('nome', 'Nome', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('email', 'E-mail', 'trim|required|valid_email');
		$this->form_validation->set_rules('assunto', 'Assunto', 'trim|required|min_length[5]');
		$this->form_validation->set_rules('mansagem', 'Mensagem', 'trim|required|min_length[30]');

		if($this->form_validation->run() == FALSE) {
			$data['formErrors'] = validation_errors();
		} else {
			$uploadCurriculo = $this->UploadFile('curriculo');
			if($uploadCurriculo['error']) {
				$data['formErrors'] = $uploadCurriculo['message'];
			} else {
				$formData = $this->input->post();
				$emailStatus = $this->SendEmailToAdmin(
					$formData['email'], $formData['nome'], "marcelocbasilio@outlook.com",
					"Marcelo (Outlook)", "Trabalhe Conosco", $formData['mensagem'],
					$formData['email'], $formData['nome'], $uploadCurriculo['fileData']['full_path']
				);
				if($emailStatus) {
					$this->session->set_flashdata('success_msg', 'Contato recebido com sucesso!');
				} else {
					$data['formErrors'] = "Desculpe! Não foi possível enviar o seu contato. Tente novamente mais tarde.";
				}
			}
		}

		$this->load->view('commons/header',$data);
		$this->load->view('trabalhe-conosco', $data);
		$this->load->view('commons/footer');		
	}

	private function GenCaptcha() {
		$this->load->helper('captcha');
		
		$vals = array(
			'img_path' => './captcha/',
			'img_url' => base_url('captcha')
		);
		/*
		$vals = array(
			'word'          => 'Random word',
        	'img_path'      => base_url('captcha'),
        	'img_url'       => base_url('captcha'),
        	'expiration'    => 7200,
        	'word_length'   => 8,
        	'font_size'     => 16,
        	'img_id'        => 'Imageid',
        	'pool'          => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',

        	// White background and border, black text and red grid
        	'colors'        => array(
            	'background' => array(255, 255, 255),
                'border' => array(255, 255, 255),
                'text' => array(0, 0, 0),
                'grid' => array(255, 40, 40)
        	)
		);
		*/

		$cap = create_captcha($vals);
		//$this->session->set_userdata('user_captcha_value', $cap['word']);
		$this->session->set_userdata('user_captcha_value', $cap['word']);
		return $cap['image'];
	}

	public function UploadFile($inputFileName)
	{
		$this->load->library('upload');

		$path = "../curriculos";

		$config['upload_path'] = $path;
		$config['allowed_types'] = 'doc|docx|pdf|zip|rar';
		$config['max_size'] = '5120';
		$config['encrypt_name'] = TRUE;

		if(!is_dir($path)) {
			mkdir($path, 0777, $recursive = true);
		}

		$this->upload->initialize($config);

		if(!$this->upload->do_upload($inputFileName)) {
			$data['error'] = true;
			$data['message'] = $this->upload->display_errors();
		} else {
			$data['error'] = false;
			$data['fileData'] = $this->upload->data();
		}
		return $data;
	}

	private function SendEmailToAdmin($from, $fromName, $to, $toName, $subject, $message, $reply = null, $replyName = null, $attach = null) {

		$this->load->library('email');

		$config['charset'] = "utf-8";
		$config['wordwrap'] = TRUE;
		$config['mailtype'] = "html";
		$config['protocol'] = "smtp";
		$config['smtp_host'] = "smtp.oriontelecom.com.br";
		$config['smtp_user'] = "basilio@oriontelecom.com.br";
		$config['smtp_pass'] = "!Ramily13";
		$config['newline'] = "\r\n";

		$this->email->initialize($config);

		$this->email->from($from, $fromName);
		$this->email->to($to, $toName);

		if($reply) {
			$this->email->reply_to($reply, $replyName);	
		} 

		if($attach) {
			$this->email->attach($attach);
		}

		$this->email->subject($subject);
		$this->email->message($message);

		if($this->email->send()) {
			return TRUE;
		} else {
			return FALSE;
		}

	}

	public function captcha_check($str)
	{
		if($str === $this->session->userdata('user_captcha_value')) {
			return TRUE;
		} else {
			$this->form_validation->set_message('captcha_check', 'O texto informado está incorreto!');
			return FALSE;
		}
	}
}