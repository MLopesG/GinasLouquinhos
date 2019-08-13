<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Professores extends CI_Controller {
	public function index()
	{
		$consulta = $this->Dao_professor->professores();
		$data = array('professores' => $consulta);
		$this->load->view('professores',$data);
	}
	public function Cadastro_professor()
	{
		$this->load->view('Cadastro_professor');
	}
	public function editar_professor($id)
	{
		$consulta = $this->Dao_professor->editar_professor($id);
		$data = array('professor' => $consulta);
		$this->load->view('Editar_professor',$data);
	}
	public function editar_salvar_professor($id)
	{
		$this->Dao_professor->update_professor($this->input->post(),$id);
		$this->session->set_flashdata('messagem', 'Informação alterada com sucesso.');
		redirect('/professores');
	}
	public function salvar_professor()
	{
			$this->form_validation->set_rules('nome_professor','Nome professor','required');

			if($this->form_validation->run() == FALSE){
				$this->load->view('Cadastro_professor');
			}else{
				$this->Dao_professor->salvar_professor($this->input->post());
				$this->session->set_flashdata('messagem', 'Professor cadastrado com sucesso.');
				redirect('/professores');
			}
	}
	public function deletar_professor($id)
	{
		$consulta = $this->Dao_professor->deletar_professor($id);
		if($consulta){
			$this->session->set_flashdata('messagem', 'Professor deletado com sucesso.');
			redirect('/professores');
		}else{
			$this->session->set_flashdata('messagem', 'Não foi possivel deletar professor, turmas cadastradas em seu nome');
			redirect('/professores');
		}
	}
}
	