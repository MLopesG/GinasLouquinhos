<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Dao_painel extends CI_Model {
	public function __construct()
    {
        parent::__construct();
    }
	public function todos_atletas($inicio,$maximo)
	{
		$this->db->select('*');
		$this->db->from('aluno_atleta');
		$this->db->join('instituicao_ensino', 'aluno_atleta.id_instituicao_ensino = instituicao_ensino.id_instituicao_ensino','left');
		$this->db->join('turmas', 'aluno_atleta.id_turma = turmas.id_turma','left');
		$this->db->join('polos_unidades', 'turmas.id_polo_unidade = polos_unidades.id_polo_unidade','left');
		$this->db->join('professores', 'turmas.id_professor = professores.id_professor','left');
		$this->db->order_by('aluno_atleta.nome_atleta','asc');
		$this->db->limit($inicio,$maximo); 
		return $this->db->get()->result();
	}
	public function todos_atletas_relatorios()
	{
		$this->db->select('*');
		$this->db->from('aluno_atleta');
		$this->db->join('instituicao_ensino', 'aluno_atleta.id_instituicao_ensino = instituicao_ensino.id_instituicao_ensino','left');
		$this->db->join('turmas', 'aluno_atleta.id_turma = turmas.id_turma','left');
		$this->db->join('polos_unidades', 'turmas.id_polo_unidade = polos_unidades.id_polo_unidade','left');
		$this->db->join('professores', 'turmas.id_professor = professores.id_professor','left');
		$this->db->order_by('aluno_atleta.nome_atleta','asc');
		return $this->db->get()->result();
	}
	public function registros_atletas()
	{
	 return $this->db->count_all_results('aluno_atleta');
	}
	public function filtro_pesquisa($tipo_filtro,$pesquisa)
	{
		$this->db->like($tipo_filtro,$pesquisa);
		$this->db->from('aluno_atleta');
		$this->db->join('instituicao_ensino', 'aluno_atleta.id_instituicao_ensino = instituicao_ensino.id_instituicao_ensino','left');
		$this->db->join('turmas', 'aluno_atleta.id_turma = turmas.id_turma','left');
		$this->db->join('polos_unidades', 'turmas.id_polo_unidade = polos_unidades.id_polo_unidade','left');
		$this->db->join('professores', 'turmas.id_professor = professores.id_professor','left');
		$this->db->order_by('aluno_atleta.nome_atleta','asc');
		return $this->db->get()->result();
	}
	public function filtro_pesquisa_idade($idade1,$idade2)
	{
		return $this->db->query("SELECT* , (YEAR(CURDATE()) - YEAR(data_nascimento_atleta)) - (RIGHT(CURDATE(),5) < RIGHT(data_nascimento_atleta,5)) AS faixaetaria FROM aluno_atleta HAVING faixaetaria BETWEEN $idade1 AND $idade2")->result();
	}
}