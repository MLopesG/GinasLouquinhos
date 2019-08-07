<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Escolas - Ginas Louquinhos</title>
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
			<p>Unidade será excluido do banco de dados.</p>
		</div>
		<div class="container">
			<div class="container-titulo">
				<h1>Unidades - cadastradas</h1>
			</div>
			<?php if($this->session->flashdata('messagem')): ?>
				<div class="erros">
					<p><?=$this->session->flashdata('messagem') ?></p>
				</div>
			<?php endif;  ?>
			<?php  foreach ($polos_unidades as $unidade):?>
				<div>
					<div class="users">
						<p><?=$unidade->polo_unidade?></p>
						<p><a onclick="excluir('<?=base_url("unidades/deletar/$unidade->id_polo_unidade")?>')"><i  class="material-icons">delete</i></a> <a href="<?=base_url("unidades/editar/$unidade->id_polo_unidade")?>"><i  class="material-icons">edit</i></a></p>
					</div>
				</div>
			<?php endforeach ?>
			<div class="btn-container">
				<a href="<?=base_url('unidades/cadastrar') ?>">Cadastrar unidade - polo</a>
			</div>
		</div>
	</main>
	<script type="text/javascript" src="<?=base_url('public/js/card.js')?>"></script>
</body>
</html>