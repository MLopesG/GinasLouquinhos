<?php 
	function qtd_alteta_turma($id){
		$CI =& get_instance();
		 $query = $CI->db->query("select count(*) as total from aluno_atleta where id_turma='$id'")->result();
		 return $query[0]->total;
	}
 ?>