<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function index()
	{
		$this->load->view('Login');
	}
	public function entrar()
	{
		$this->form_validation->set_rules('e-mail','E-mail','required');
		$this->form_validation->set_rules('senha','Senha','required');

		if($this->form_validation->run() == FALSE){
			$this->load->view('Login');
		}else{
			$user = $this->input->post('e-mail');
			$password = md5($this->input->post('senha'));

			$verificar_usuario = $this->Dao_login->entrar($user,$password);

			if($verificar_usuario != null){
				$this->session->tempdata();
				$this->session->set_userdata('logado',$verificar_usuario);
				redirect('/painel');
			}else{
				$this->session->set_flashdata('messagem','E-mail ou senha inválidos');
				redirect('/');
			}
		}
	}
	public function sair(){
		$this->session->sess_destroy();
		redirect('/');
	}
}
