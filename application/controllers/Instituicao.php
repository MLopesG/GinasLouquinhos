<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Instituicao extends CI_Controller {
	public function index()
	{
		$consulta = $this->Dao_instituicao->instituicoes();
		$data = array('instituicoes' => $consulta);
		$this->load->view('Instituições',$data);
	}
	public function Cadastro_instituicao()
	{
		$this->load->view('Cadastro_Instituição');
	}
	public function editar_instituicao($id)
	{
		$consulta = $this->Dao_instituicao->editar_instituicao($id);
		$data = array('instituicao' => $consulta);
		$this->load->view('Editar_Instituição',$data);
	}
	public function editar_salvar_instituicao($id)
	{
		$this->Dao_instituicao->update_instituicao($this->input->post(),$id);
		$this->session->set_flashdata('messagem', 'Informações alteradas com sucesso.');
		redirect('/instituicoes');
	}
	public function salvar_instituicao()
	{

			$this->form_validation->set_rules('nome_instituicao_ensino','Nome instituição de ensino','required');

			if($this->form_validation->run() == FALSE){
				$this->load->view('Cadastro_Instituição');
			}else{
				$this->Dao_instituicao->salvar_instituicao($this->input->post());
				$this->session->set_flashdata('messagem', ' instituição de ensino cadastrada com sucesso.');
				redirect('/instituicoes');
			}
	}
	public function deletar_instituicao($id)
	{
		$consulta = $this->Dao_instituicao->deletar_instituicao($id);
		$this->session->set_flashdata('messagem', 'instituição de ensino deletada com sucesso.');
		redirect('/instituicoes');
	}
}
	