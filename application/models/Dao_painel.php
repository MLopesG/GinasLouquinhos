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
		$this->db->join('instituicao_ensino', 'aluno_atleta.id_instituicao_ensino = instituicao_ensino.id_instituicao_ensino');
		$this->db->limit($inicio,$maximo); 
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
		$this->db->join('instituicao_ensino', 'aluno_atleta.id_instituicao_ensino = instituicao_ensino.id_instituicao_ensino');
		return $this->db->get()->result();
	}
}