<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Dao_turmas extends CI_Model {
   public function __construct()
   {
       parent::__construct();
   }
   public function count_alunos_turma($id)
   {
      $this->db->select('*');
      $this->db->from('aluno_atleta');
      $this->db->where('id_turma',$id);
      return $this->db->count_all();
   }
   public function lista_turma_alunos($id)
   {
    $this->db->select('*');
    $this->db->from('aluno_atleta');
    $this->db->join('instituicao_ensino', 'aluno_atleta.id_instituicao_ensino = instituicao_ensino.id_instituicao_ensino');
    $this->db->join('turmas', 'aluno_atleta.id_turma = turmas.id_turma');
    $this->db->join('polos_unidades', 'turmas.id_polo_unidade = polos_unidades.id_polo_unidade');
    $this->db->join('professores', 'turmas.id_professor = professores.id_professor');
    $this->db->where('aluno_atleta.id_turma',$id);
    return $this->db->get()->result();
   }
   public function salvar_turmas($campos)
	{
		$this->db->set($campos);
		return $this->db->insert('turmas');
	}
  public function filtro_turma($tipo_filtro,$pesquisa)
  {
    $this->db->like($tipo_filtro,$pesquisa);
    $this->db->from('turmas');
    $this->db->join('professores', 'turmas.id_professor = professores.id_professor');
    $this->db->join('polos_unidades', 'turmas.id_polo_unidade = polos_unidades.id_polo_unidade');
    $this->db->order_by('turmas.id_turma','desc');
    return $this->db->get()->result();
  }
	public function turmas()
  {
    $this->db->select('*');
    $this->db->from('turmas');
    $this->db->join('professores', 'turmas.id_professor = professores.id_professor','left');
    $this->db->join('polos_unidades', 'turmas.id_polo_unidade = polos_unidades.id_polo_unidade','left');
    $this->db->order_by('turmas.id_turma','desc');
    return $this->db->get()->result();
  }
    public function deletar_turma($id)
	{
		return $this->db->delete('turmas', array('id_turma' => $id)); 
	}
  public function professores()
  {
    return $this->db->get('professores')->result();
  }
  public function editar_turma($id)
  {
    $this->db->select('*');
    $this->db->from('turmas');
    $this->db->join('professores', 'turmas.id_professor = professores.id_professor');
    $this->db->join('polos_unidades', 'turmas.id_polo_unidade = polos_unidades.id_polo_unidade');
    $this->db->where('turmas.id_turma',$id);
    return $this->db->get()->result();
  }
  public function update_turma($campos,$id)
  {
    $this->db->set($campos);
    $this->db->where('id_turma', $id);
    return $this->db->update('turmas');
  }
  public function turma($id)
  {
    $this->db->where('id_turma',$id);
    return $this->db->get('turmas')->result();
  }
}