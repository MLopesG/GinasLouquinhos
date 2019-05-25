<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Dao_usuario extends CI_Model {
   public function __construct()
   {
       parent::__construct();
   }
   public function salvar_usuario($campos)
	{
		$this->db->set($campos);
		return $this->db->insert('usuarios');
	}
	public function usuarios()
    {
    	$query = $this->db->get('usuarios');
 		return $query->result();
    }
    public function deletar_usuario($id)
	{
		return $this->db->delete('usuarios', array('id_usuario' => $id)); 
	}
}