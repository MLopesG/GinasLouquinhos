<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Professores - Ginas Louquinhos</title>
	<meta charset="utf-8">
	<link rel="shortcut icon" href="<?=base_url('public/img/índice.png');?>" type="image/png"/>
	<link rel="stylesheet" type="text/css" href='<?=base_url('public/css/style.css');?>'>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php include('public/componentes/validar_login.inc.php');?>
</head>
<body>
	<?php include('public/componentes/header.inc.php');?>
	<main>
		<div id="messagem" title="Deseja excluir instituição de ensino?">
			<p>Professor será excluido do banco de dados.</p>
		</div>
		<div class="container">
			<div class="container-titulo">
				<h1>Professores - cadastrados</h1>
			</div>
			<?php if($this->session->flashdata('messagem')): ?>
				<div class="erros">
					<p><?=$this->session->flashdata('messagem') ?></p>
				</div>
			<?php endif;  ?>
			<?php  foreach ($professores as $professor):?>
				<div>
					<div class="users">
						<p><?=$professor->nome_professor?> </p>
						<p><a onclick="excluir('<?=base_url("professores/deletar/$professor->id_professor")?>')"><i  class="material-icons">delete</i></a> <a href="<?=base_url("professores/editar/$professor->id_professor")?>"><i  class="material-icons">edit</i></a></p>
					</div>
				</div>
			<?php endforeach ?>
			<div class="btn-container">
				<a href="<?=base_url('professores/cadastrar') ?>">Cadastrar professor</a>
			</div>
		</div>
	</main>
	<script type="text/javascript" src="<?=base_url('public/js/card.js')?>"></script>
</body>
</html>