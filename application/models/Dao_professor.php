<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Dao_professor extends CI_Model {
   public function __construct()
   {
       parent::__construct();
   }
   public function salvar_professor($campos)
	{
		$this->db->set($campos);
		return $this->db->insert('professores');
	}
	public function professores()
  {
    return $this->db->get('professores')->result();
  }
    public function deletar_professor($id)
	{
		return $this->db->delete('professores', array('id_professor' => $id)); 
	}
  public function editar_professor($id)
  {
    $this->db->select('*');
    $this->db->from('professores');
    $this->db->where('id_professor',$id);
    return $this->db->get()->result();
  }
  public function update_professor($campos,$id)
  {
    $this->db->set($campos);
    $this->db->where('id_professor', $id);
    return $this->db->update('professores');
  }
}