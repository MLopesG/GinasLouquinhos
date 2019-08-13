<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Polos extends CI_Controller {
	public function index()
	{	
		$polos_unidades = $this->Dao_polos->polos_unidades();
		$data = array('polos_unidades'=>$polos_unidades);
		$this->load->view('Polos_unidades',$data);
	}
	public function Cadastro_polo_unidade()
	{
		$this->load->view('Cadastro_polos_unidades');
	}
	public function editar_polo_unidade($id)
	{
		$consulta = $this->Dao_polos->editar_polo_unidade($id);
		$data = array('unidade' => $consulta);
		$this->load->view('Editar_polos_unidades',$data);
	}
	public function editar_polo_unidade_salvar($id)
	{
		$this->Dao_polos->update_polo_unidade($this->input->post(),$id);
		$this->session->set_flashdata('messagem', 'Informações alteradas com sucesso.');
		redirect('/unidades');
	}
	public function salvar_polo_unidade()
	{
		$this->form_validation->set_rules('polo_unidade','Nome unidade ','required');
		$this->form_validation->set_rules('endereco','Endereço unidade ','required');

		if($this->form_validation->run() == FALSE){
			$this->load->view('Cadastro_polos_unidades');
		}else{
			$this->Dao_polos->salvar_polo_unidade($this->input->post());
			$this->session->set_flashdata('messagem', ' Polo(unidade) cadastrado com sucesso.');
			redirect('/unidades');
		}
	}
	public function deletar_polo_unidade($id)
	{
		$consulta = $this->Dao_polos->deletar_polo_unidade($id);
		$this->session->set_flashdata('messagem', 'Unidade deletada com sucesso.');
		redirect('/unidades');
	}
}
	