<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Gerar ficha de chamada - Ginas Louquinhos</title>
	<meta charset="utf-8">
	<link rel="shortcut icon" href="<?=base_url('public/img/índice.png');?>" type="image/png"/>
	<link rel="stylesheet" type="text/css" href='<?=base_url('public/css/style.css');?>'>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php include('public/componentes/validar_login.inc.php');?>
</head>
<body>
	<?php include('public/componentes/header.inc.php');?>
	<main>
		<div class="container">
			<?php if(validation_errors() == true): ?>
				<div class="erros">
					<h1>Preencha todos os campos.</h1>
					<?php echo validation_errors(); ?>
				</div>
			<?php endif; ?>
			<?php if($this->session->flashdata('messagem')): ?>
				<div class="erros">
					<p><?=$this->session->flashdata('messagem') ?></p>
				</div>
			<?php endif;  ?>
			<div class="container-titulo">
				<h1>Ficha de chamada  turma - <?=$turma[0]->id_turma ?></h1>
			</div>
			<div class="erros">
				<p>Dias: <?=$turma[0]->dias_semanais?></p>
				<p>Horário: <?=$turma[0]->horario_inicio?> às <?=$turma[0]->horario_final?></p>
			</div>
			<form action="<?=base_url("turmas/ficha/".$turma[0]->id_turma."") ?>" method='post'>
				<div class="container-input">
					<label>Professor(a):</label>
					<input type="text" name="professor" id="professor" value="<?=$turma[0]->nome_professor?>">
				</div>
				<div class="container-input">
					<label for="escola">Confirmar Escola:</label>
					<input type="text" name="escola" id="escola">
				</div>
				<div class="container-input">
					<label for="data_inicio">Data inicio bimestre:</label>
					<input type="date" name="data_inicio" format="dd/MM/yyyy" id="data_inicio" >
				</div>
				<div class="container-input">
					<label for="data_fim">Data final bimestre:</label>
					<input type="date" name="data_fim" format="dd/MM/yyyy" id="data_fim">
				</div>
				<div class="container-input">
					<input type="submit" value="Gerar ficha frequencia" >
				</div>
			</form>
		</div>
	</main>
	<script type="text/javascript" src="<?=base_url('public/js/card.js')?>"></script>
</body>
</html>