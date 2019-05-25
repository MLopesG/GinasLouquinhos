<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Dao_atleta extends CI_Model {
	public function __construct()
    {
        parent::__construct();
    }
    public function Todos_instituicao_ensino()
    {
    	$query = $this->db->get('instituicao_ensino');
 		return $query->result();
    }
	public function deletar_atleta($id)
	{
		return $this->db->delete('aluno_atleta', array('id_aluno_atleta' => $id)); 
	}
	public function editar_atleta($id)
	{
		$this->db->select('*');
		$this->db->from('aluno_atleta');
		$this->db->join('instituicao_ensino', 'aluno_atleta.id_instituicao_ensino = instituicao_ensino.id_instituicao_ensino');
		$this->db->where('aluno_atleta.id_aluno_atleta',$id);
		return $this->db->get()->result();
	}
	public function update_atleta($campos,$id)
	{
		$this->db->set($campos);
		$this->db->where('id_aluno_atleta', $id);
		return $this->db->update('aluno_atleta');
	}
	public function salvar_atleta($campos)
	{
		$this->db->set($campos);
		return $this->db->insert('aluno_atleta');
	}
}