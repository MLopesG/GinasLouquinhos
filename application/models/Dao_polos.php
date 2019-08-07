<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Dao_polos extends CI_Model {
	public function polos_unidades()
	{
		return $this->db->get('polos_unidades')->result();
	}
	 public function salvar_polo_unidade($campos)
	{
		$this->db->set($campos);
		return $this->db->insert('polos_unidades');
	}
	 public function deletar_polo_unidade($id)
	{
		return $this->db->delete('polos_unidades', array('id_polo_unidade' => $id)); 
	}
	public function editar_polo_unidade($id)
	{
		$this->db->select('*');
	    $this->db->from('polos_unidades');
	    $this->db->where('id_polo_unidade',$id);
	    return $this->db->get()->result();
	}
	public function update_polo_unidade($campos,$id)
	{
		$this->db->set($campos);
	    $this->db->where('id_polo_unidade', $id);
	    return $this->db->update('polos_unidades');
	}
}