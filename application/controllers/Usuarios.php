

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {
	public function index()
	{
		$consulta = $this->Dao_usuario->usuarios();
		$data = array('usuarios' => $consulta);
		$this->load->view('Usuários',$data);
	}
	public function Cadastrar_usuario()
	{
		$this->load->view('Cadastrar_usuários');
	}
	public function salvar_usuario()
	{

			$this->form_validation->set_rules('nome_usuario','Nome completo','required');
			$this->form_validation->set_rules('email_usuario','E-mail','required');
			$this->form_validation->set_rules('senha_usuario','Senha','required');

			if($this->form_validation->run() == FALSE){
				$this->load->view('Cadastrar_usuários');
			}else{
				$Usuario =  array('nome_usuario'=>$this->input->post('nome_usuario'),
							'email_usuario'=>$this->input->post('email_usuario'),
							'senha_usuario'=>md5($this->input->post('senha_usuario')));
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
	
