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
    	$query = $this->db->get('instituicao_ensino');
 		return $query->result();
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