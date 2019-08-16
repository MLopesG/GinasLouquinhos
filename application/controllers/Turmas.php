<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Turmas extends CI_Controller {
	public function index()
	{	
		$turmas = $this->Dao_turmas->turmas();
		$data = array('turmas'=>$turmas);
		$this->load->view('Turmas',$data);
	}
	public function Cadastro_turma()
	{
		$polos_unidades = $this->Dao_polos->polos_unidades();
		$professores = $this->Dao_turmas->professores();
		$data = array('polos_unidades' => $polos_unidades,'professores'=>$professores);
		$this->load->view('Cadastro_turma',$data);
	}
	public function filtro_turma()
	{
		$tipo_pesquisa = $this->input->post('tipo_pesquisa');
		$pesquisa_input = $this->input->post('pesquisa');
		$pesquisa = null;
		$tipo_filtro = null;
		
		if($tipo_pesquisa == 'Horário inicio'){
			$tipo_filtro = 'horario_inicio';
			$pesquisa = $pesquisa_input;
		}else if($tipo_pesquisa =='Periodo' ){
			$tipo_filtro = 'turno';
			$pesquisa = $pesquisa_input;			
		}else if ($tipo_pesquisa == 'Dias da semana') {
			$tipo_filtro = 'dias_semanais';
			$pesquisa = $pesquisa_input;						
		}else if($tipo_pesquisa == 'Professor(a)'){
			$tipo_filtro = 'nome_professor';
			$pesquisa = $pesquisa_input;
		}else if($tipo_pesquisa == 'Unidade'){
			$tipo_filtro = 'polo_unidade';
			$pesquisa = $pesquisa_input;
		}else{
			$this->session->set_flashdata('messagem', 'Tipo de pesquisa não selecionado');
			redirect('/turmas');
		}
		$consulta = $this->Dao_turmas->filtro_turma($tipo_filtro,$pesquisa);
	
		if($consulta == false){
			$this->session->set_flashdata('messagem', 'Pesquisa não encontrada.');
			redirect('/turmas');
		}else{
			$data['turmas'] = $consulta;
			$this->load->view ('Turmas',$data);
		}
	}
	public function editar_turma($id)
	{
		$consulta = $this->Dao_turmas->editar_turma($id);
		$polos_unidades = $this->Dao_polos->polos_unidades();
		$professores = $this->Dao_turmas->professores();
		$data = array('turma' => $consulta,'polos_unidades' => $polos_unidades,'professores'=>$professores);
		$this->load->view('Editar_turma',$data);
	}
	public function editar_turma_salvar($id)
	{
		$this->Dao_turmas->update_turma($this->input->post(),$id);
		$this->session->set_flashdata('messagem', 'Informações alteradas com sucesso.');
		redirect('/turmas');
	}
	public function salvar_turma()
	{
		$this->form_validation->set_rules('dias_semanais','Dias de semana','required');
		$this->form_validation->set_rules('horario_inicio','Horário de inicio','required');
		$this->form_validation->set_rules('horario_final','Horário final','required');
		$this->form_validation->set_rules('id_professor','Professor','required');
		$this->form_validation->set_rules('id_polo_unidade','Unidade que ocorreram as aulas','required');
		$this->form_validation->set_rules('turno','Periodo','required');

		if($this->form_validation->run() == FALSE){
			$polos_unidades = $this->Dao_polos->polos_unidades();
			$professores = $this->Dao_turmas->professores();
			$data = array('polos_unidades' => $polos_unidades,'professores'=>$professores);
			$this->load->view('Cadastro_turma',$data);
		}else{
			$this->Dao_turmas->salvar_turmas($this->input->post());
			$this->session->set_flashdata('messagem', ' Turma aberta com sucesso.');
			redirect('/turmas');
		}
	}
	public function lista_turmas($id)
	{
		$data['atletas'] = $this->Dao_turmas->lista_turma_alunos($id);

		if(count($data['atletas']) == 0){
			$this->session->set_flashdata('messagem', 'Não há atletas cadastrados nesse turma.');
			redirect('/turmas');
		}else{
			$this->load->view('Lista_alunos',$data);
		}
		
	}
	public function deletar_turma($id)
	{
		$consulta = $this->Dao_turmas->deletar_turma($id);
		$this->session->set_flashdata('messagem', 'Turma deletada com sucesso.');
		redirect('/turmas');
	}
	public function alunos_turma($id)
	{
		$consulta = $this->Dao_turmas->lista_turma_alunos($id);

		if(count($consulta) == 0){
			$this->session->set_flashdata('messagem', 'Não há atletas cadastrados nesse turma');
			redirect('/turmas');
		}else{
			$data['turma'] = $consulta;
			$this->load->view('Relatorio-turma',$data);
		}
	}
	public function chamada_aluno($id)
	{

		$meses = array ('01' => "Janeiro", '02' => "Fevereiro", '03' => "Março", '04' => "Abril", '05' => "Maio", '06' => "Junho", '07' => "Julho", '08' => "Agosto", '09' => "Setembro", '10' => "Outubro", '11' => "Novembro", '12' => "Dezembro");

		$diasdasemana = array ('Terça e Quinta' => array(2,4),'Segunda, Quarta e Sexta' => array(1,3,5),'Quarta e Sexta'=> array(3,5));

		$consulta = $this->Dao_turmas->lista_turma_alunos($id);

		if(count($consulta) == 0){
			$this->session->set_flashdata('messagem', 'Não há atletas cadastrados nesse turma');
			redirect('/turmas');
		}else{
			$data['mes'] = null;
			$datas_chamadas = array();
			$dias = $diasdasemana[$consulta[0]->dias_semanais];

			foreach ($dias as $dia) {
				$mes_inicio = date('m');
				$dia_inicio = $dia;
				$ano_inicio = date('y');

				$mes_fim = date('m');
				$dia_fim = date('t', mktime(0, 0, 0, 10, 10, date('y')));
				$ano_fim = date('y');

				$dini = mktime(0,0,0,$mes_inicio,$dia_inicio,$ano_inicio);
				$dfim = mktime(0,0,0,$mes_fim,$dia_fim,$ano_fim); 

				while($dini <= $dfim)
				{      
				   $dt = date("d/m",$dini);
				   $diasemana = date("w", $dini);   
				   
				   if($diasemana == $dia_inicio){
				       $datas_chamadas[] = $dt;     
				   }
				    $data['mes']  = $meses[date('m')];
				   $dini += 86400;
				}
			}
			$data['data_para_chamada'] =  $datas_chamadas;
			$data['turma'] = $consulta;
			$this->load->view('Chamada',$data);
		}
	}
	
}
	