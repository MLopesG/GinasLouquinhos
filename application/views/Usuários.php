<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Usuários - Ginas Louquinhos</title>
	<meta charset="utf-8">
	<link rel="shortcut icon" href="<?=base_url('public/img/índice.png');?>" type="image/png"/>
	<link rel="stylesheet" type="text/css" href='<?=base_url('public/css/style.css');?>'>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php include('public/componentes/validar_login.inc.php');?>
</head>
<body>
	<?php include('public/componentes/header.inc.php');?>
	<main>
		<div id="messagem" title="Deseja excluir atleta?">
			<p>Usuário será excluido do banco de dados.</p>
		</div>
		<div class="container">
			<div class="container-titulo">
				<h1>Usuários - cadastrados</h1>
			</div>
			<?php if($this->session->flashdata('messagem')): ?>
				<div class="erros">
					<p><?=$this->session->flashdata('messagem') ?></p>
				</div>
			<?php endif;  ?>
			<?php  foreach ($usuarios as $usuario):?>
				<div>
					<div class="users">
						<p><?=$usuario->nome_usuario?></p>
						<p><a onclick="excluir('<?=base_url("usuarios/deletar/$usuario->id_usuario")?>')"><i id="abrir" class="material-icons">delete</i></a></p>
						
					</div>
				</div>
			<?php endforeach ?>
			<div class="btn-container">
				<a href="<?=base_url('usuarios/cadastrar') ?>">Cadastrar Usuário</a>
			</div>
		</div>
	</main>
	<script type="text/javascript" src="<?=base_url('public/js/card.js')?>"></script>
</body>
</html>