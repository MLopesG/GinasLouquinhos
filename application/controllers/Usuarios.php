<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {
	public function __construct()
    {
        parent::__construct();

        if($this->session->userdata('logado')[0]->nivel_acesso == 'Visitante'){
        	$this->session->set_flashdata('messagem', "Acesso não permitido.");
        	redirect('/painel');
        }
    }
	public function index()
	{
		$consulta = $this->Dao_usuario->usuarios();
		$data = array('usuarios' => $consulta);
		$this->load->view('usuarios',$data);
	}
	public function Cadastrar_usuario()
	{
		$this->load->view('Cadastrar_usuarios');
	}
	public function salvar_usuario()
	{

			$this->form_validation->set_rules('nome_usuario','Nome completo','required');
			$this->form_validation->set_rules('email_usuario','E-mail','required');
			$this->form_validation->set_rules('senha_usuario','Senha','required');

			if($this->form_validation->run() == FALSE){
				$this->load->view('Cadastrar_usuarios');
			}else{
				$Usuario =  array('nome_usuario'=>$this->input->post('nome_usuario'),
							'email_usuario'=>$this->input->post('email_usuario'),
							'senha_usuario'=>md5($this->input->post('senha_usuario')),
							'nivel_acesso'=>$this->input->post('nivel_acesso'));
				$this->Dao_usuario->salvar_usuario($Usuario);
				$this->session->set_flashdata('messagem', 'Usuario cadastrado com sucesso.');
				redirect('/Usuarios');
			}
	}
	public function deletar_atleta($id)
	{
		$consulta = $this->Dao_usuario->deletar_usuario($id);
		$this->session->set_flashdata('messagem', 'Usuário deletado com sucesso.');
		redirect('/usuarios');
	}
}
	
