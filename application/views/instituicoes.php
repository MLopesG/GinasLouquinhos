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
			<p>Escola será excluido do banco de dados.</p>
		</div>
		<div class="container">
			<div class="container-titulo">
				<h1>Escolas - cadastradas</h1>
			</div>
			<?php if($this->session->flashdata('messagem')): ?>
				<div class="erros">
					<p><?=$this->session->flashdata('messagem') ?></p>
				</div>
			<?php endif;  ?>
			<?php  foreach ($instituicoes as $instituicao):?>
				<div>
					<div class="users">
						<p><?=$instituicao->nome_instituicao_ensino?> <b>(<?=$instituicao->quantidade_por_escola ?>) - alunos</b></p>
						<p><a onclick="excluir('<?=base_url("instituicao/deletar/$instituicao->id_instituicao_ensino")?>')"><i  class="material-icons">delete</i></a> <a href="<?=base_url("instituicao/editar/$instituicao->id_instituicao_ensino")?>"><i  class="material-icons">edit</i></a></p>
						
					</div>
				</div>
			<?php endforeach ?>
			<div class="btn-container">
				<a href="<?=base_url('instituicao/cadastrar') ?>">Cadastrar escola</a>
			</div>
		</div>
	</main>
	<script type="text/javascript" src="<?=base_url('public/js/card.js')?>"></script>
</body>
</html>