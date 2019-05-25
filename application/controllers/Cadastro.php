<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cadastro extends CI_Controller {
	public function index()
	{
		$instituicao_ensino = $this->Dao_atleta->Todos_instituicao_ensino(); 
		$data = array('instituicao_ensino'=>$instituicao_ensino);
		$this->load->view('Cadastro-atleta',$data);
	}
	public function deletar_atleta($id)
	{
		$consulta = $this->Dao_atleta->deletar_atleta($id);
		$this->session->set_flashdata('messagem', 'Atleta deletado com sucesso.');
		redirect('/painel');
	}
	public function editar_atleta($id)
	{
		$instituicao_ensino = $this->Dao_atleta->Todos_instituicao_ensino(); 
		$consulta = $this->Dao_atleta->editar_atleta($id);
		$data = array('atleta' => $consulta,'instituicao_ensino'=>$instituicao_ensino);
		$this->load->view('Editar-atleta',$data);
	}
	public function editar_salvar_atleta($id)
	{
		$this->Dao_atleta->update_atleta($this->input->post(),$id);
		$this->session->set_flashdata('messagem', 'Informações alteradas com sucesso.');
		redirect('/painel');
	}
	public function salvar_atleta()
	{


			$this->form_validation->set_rules('nome_atleta','Nome completo','required');
			$this->form_validation->set_rules('rg_atleta','RG','required');
			$this->form_validation->set_rules('cpf_atleta','CPF','required|min_length[8]');
			$this->form_validation->set_rules('data_nascimento_atleta','Data nascimento','required');
			$this->form_validation->set_rules('responsavel','Nome responsável','required');
  			$this->form_validation->set_rules('sexo_atleta', 'Sexo atleta','required');
  			$this->form_validation->set_rules('unidade', 'Unidade','required');
  			$this->form_validation->set_rules('id_instituicao_ensino', 'Instituição de ensino','required');
			$this->form_validation->set_rules('cpf_responsavel','CPF responsável','required|min_length[8]');
			$this->form_validation->set_rules('email_responsavel','E-mail responsável','required');
			$this->form_validation->set_rules('parentesco_responsavel' ,'parentesco responsável','required');
			$this->form_validation->set_rules('rg_responsavel','RG responsável','required');
			$this->form_validation->set_rules('cel_responsavel','Celular responsável','required');
			$this->form_validation->set_rules('dias_participacao','Dias de participação','required');
			$this->form_validation->set_rules('data_cadastro','Data cadastro','required');
			$this->form_validation->set_rules('horario_participacao','Horário','required');
			



			if($this->form_validation->run() == FALSE){
				$instituicao_ensino = $this->Dao_atleta->Todos_instituicao_ensino(); 
				$data = array('instituicao_ensino'=>$instituicao_ensino);
				$this->load->view('Cadastro-atleta',$data);
			}else{
				$this->Dao_atleta->salvar_atleta($this->input->post());
				$this->session->set_flashdata('messagem', 'Atleta registrado com sucesso.');
				redirect('/atleta/cadastro');
			}
	}
}
