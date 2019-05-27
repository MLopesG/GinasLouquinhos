<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Painel extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
    }
	public function index()
	{
		$config = array();
        $config["base_url"] = base_url() . "painel";
        $config["total_rows"] = $this->Dao_painel->registros_atletas();
        $config["per_page"] = 10;
        $config["uri_segment"] = 2;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        $data["links"] = $this->pagination->create_links();
        $data['total'] = $this->Dao_painel->registros_atletas();
        $data['atletas'] = $this->Dao_painel->todos_atletas($config["per_page"], $page);
		$this->load->view('Painel',$data);
	}
	public function filtro()
	{
		$tipo_pesquisa = $this->input->post('tipo_pesquisa');
		$pesquisa_input = $this->input->post('pesquisa');
		$pesquisa = null;
		$tipo_filtro = null;
		$data['total'] = 0;
		
		if($tipo_pesquisa == 'Data Nascimento'){
			$tipo_filtro = 'data_nascimento_atleta';
			$pesquisa = $pesquisa_input;
		}else if($tipo_pesquisa =='Sexo' ){
			$tipo_filtro = 'sexo_atleta';
			$pesquisa = $pesquisa_input;			
		}else if ($tipo_pesquisa == 'Unidade') {
			$tipo_filtro = 'Unidade';
			$pesquisa = $pesquisa_input;						
		}else if($tipo_pesquisa == 'Atleta'){
			$tipo_filtro = 'nome_atleta';
			$pesquisa = $pesquisa_input;
		}else if($tipo_pesquisa == 'Instituição de ensino'){
			$tipo_filtro = 'instituicao_ensino.nome_instituicao_ensino';
			$pesquisa = $pesquisa_input;
		}else{
			$this->session->set_flashdata('messagem', 'Tipo de pesquisa não selecionado');
			redirect('/painel');
		}

		$consulta = $this->Dao_painel->filtro_pesquisa($tipo_filtro,$pesquisa);
		
		if($consulta == false){
			$this->session->set_flashdata('messagem', 'Pesquisa não encontrada.');
			redirect('/painel');
		}else{
			$data['total'] = count($consulta);
			$data['atletas'] = $consulta;
			$this->load->view ('Painel',$data);
		}
	}
	public function filtro_relatorios()
	{
		$tipo_pesquisa = $this->input->post('tipo_pesquisa');
		$pesquisa_input = $this->input->post('pesquisa');
		$pesquisa = null;
		$tipo_filtro = null;
		$data['total'] = 0;
		
		if($tipo_pesquisa == 'data nascimento'){
			$tipo_filtro = 'data_nascimento_atleta';
			$pesquisa = $pesquisa_input;
		}else if($tipo_pesquisa =='sexo' ){
			$tipo_filtro = 'sexo_atleta';
			$pesquisa = $pesquisa_input;			
		}else if ($tipo_pesquisa == 'unidade') {
			$tipo_filtro = 'unidade';
			$pesquisa = $pesquisa_input;						
		}else if($tipo_pesquisa == 'instituição de ensino'){
			$tipo_filtro = 'nome_instituicao_ensino';
			$pesquisa = $pesquisa_input;
		}else{
			$this->session->set_flashdata('messagem', 'Tipo de pesquisa não selecionado');
			redirect('/painel/relatorios');
		}

		$consulta = $this->Dao_painel->filtro_pesquisa($tipo_filtro,$pesquisa);
		
		if($consulta == false){
			$this->session->set_flashdata('messagem', 'Pesquisa não encontrada.');
			redirect('/painel/relatorios');
		}else{
			foreach ($consulta as $filter) {
				$consultas[] =  (object) [
				    'nome_atleta' => $filter->nome_atleta,
				    'tipo_pesquisa' => $tipo_pesquisa,
				    'categoria'=>$consulta[0]->$tipo_filtro
				  ];
			};
			$data['pesquisa'] = $tipo_pesquisa;
			$data['total'] = count($consulta);
			$data['atletas'] = $consultas;
			$this->load->view ('Relatorios',$data);
		}
	}
	public function filtro_relatorio_idade()
	{
		$idade_1 = $this->input->post('idade_1');
		$idade_2 = $this->input->post('idade_2');

		if($idade_1 == '' and $idade_2 == ''){
				$this->session->set_flashdata('messagem', 'Campos vazios, preencha com determinadas idades');
				redirect('/painel/relatorios');
		}else{
			$consulta = $this->Dao_painel->filtro_pesquisa_idade($idade_1,$idade_2);
			
			if($consulta == false){
				$this->session->set_flashdata('messagem', 'faixaetária não encontrada.');
				redirect('/painel/relatorios');
			}else{
				$consultas = array();

				foreach ($consulta as $key => $filter) {
					$consultas[] =  (object) [
					    'nome_atleta' => $filter->nome_atleta,
					    'tipo_pesquisa' => 'faixaetária de idade',
					    'categoria'=>$consulta[$key]->faixaetaria
					  ];
				};

				$data['pesquisa'] = 'faixaetária de idade';
				$data['total'] = count($consulta);
				$data['atletas'] = $consultas;
				$this->load->view ('Relatorios',$data);
			}
		}
	}
	public function Relatorios()
	{
		$data['total'] = 0;
		$data['atletas'] = $this->Dao_painel->todos_atletas_relatorios();
		$this->load->view('Relatorios',$data);
	}
}
