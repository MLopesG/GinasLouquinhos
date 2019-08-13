<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Dao_instituicao extends CI_Model {
   public function __construct()
   {
       parent::__construct();
   }
   public function salvar_instituicao($campos)
	{
		$this->db->set($campos);
		return $this->db->insert('instituicao_ensino');
	}
	public function instituicoes()
    {
	   $this->db->select('instituicao_ensino.*, COUNT(aluno_atleta.id_aluno_atleta) as quantidade_por_escola')
     ->from('instituicao_ensino');
      $this->db->join('aluno_atleta', 'instituicao_ensino.id_instituicao_ensino = aluno_atleta.id_instituicao_ensino', 'left')
     ->group_by('instituicao_ensino.nome_instituicao_ensino');
     $this->db->order_by('quantidade_por_escola','desc');
      return $this->db->get()->result();
    }
    public function deletar_instituicao($id)
	{
		return $this->db->delete('instituicao_ensino', array('id_instituicao_ensino' => $id)); 
	}
  public function editar_instituicao($id)
  {
    $this->db->select('*');
    $this->db->from('instituicao_ensino');
    $this->db->where('id_instituicao_ensino',$id);
    return $this->db->get()->result();
  }
  public function update_instituicao($campos,$id)
  {
    $this->db->set($campos);
    $this->db->where('id_instituicao_ensino', $id);
    return $this->db->update('instituicao_ensino');
  }
}