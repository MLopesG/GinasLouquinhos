<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Dao_login extends CI_Model {
   public function __construct()
   {
       parent::__construct();
   }
   public function entrar($user,$password)
	{
		$this->db->select('*');
 		$this->db->from('usuarios');
		$this->db->where('email_usuario',$user);
		$this->db->where('senha_usuario',$password);
		return $this->db->get()->result();
	}
}