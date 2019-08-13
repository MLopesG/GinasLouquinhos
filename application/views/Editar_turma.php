<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Cadastrar(abrir) turma - Ginas Louquinhos</title>
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
				<h1>Alterar dados turmas</h1>
			</div>
			<form action="<?=base_url("turmas/editar/salvar/".$turma[0]->id_turma."") ?>" method='post'>
				<div class="container-input">
					<label for="dias_semanais">Dias da semana</label>
					<input type="text" name="dias_semanais" id="dias_semanais" value="<?=$turma[0]->dias_semanais ?>">
				</div>
				<div class="container-input">
					<label for="horario_inicio">Horário inicio:</label>
					<input type="time" name="horario_inicio" id="horario_inicio" value="<?=$turma[0]->horario_inicio ?>" >
				</div>
				<div class="container-input">
					<label for="horario_final">Horário final:</label>
					<input type="time" name="horario_final" id="horario_final" value="<?=$turma[0]->horario_final ?>">
				</div>
				<div class="container-input">
					<label>Professor(a):</label>
					<select name="id_professor">
						<option value="<?=$turma[0]->id_professor ?>">Professor atual: <?=$turma[0]->nome_professor ?></option>
						<?php foreach ($professores as $professor):?>
							<option value="<?=$professor->id_professor ?>"><?=$professor->nome_professor ?></option>
						<?php endforeach; ?>
					</select>
				</div>
				<div class="container-input">
					<label>Unidade:</label>
					<select name="id_polo_unidade">
						<option value="<?=$turma[0]->id_polo_unidade ?>">Unidade atual: <?=$turma[0]->polo_unidade?></option>
						<?php foreach ($polos_unidades as $polos):?>
							<option value="<?=$polos->id_polo_unidade ?>"><?=$polos->polo_unidade ?></option>
						<?php endforeach; ?>
					</select>
				</div>
				<div class="container-input">
					<label for="turno">Periodo:</label>
					<select name="turno">
						<option value="<?=$turma[0]->turno ?>">Periodo atual: <?=$turma[0]->turno ?></option>
						<option value="Matutino">Matutino</option>
						<option value="Vespertino">Vespertino</option>
					</select>
				</div>
				<div class="container-input">
					<label for="quantidade_vagas">Quantidade de vagas:</label>
					<input type="number" name="quantidade_vagas" id="quantidade_vagas" value="<?=$turma[0]->quantidade_vagas ?>">
				</div>
				<div class="container-input">
					<input type="submit" value="Alterar" >
				</div>
			</form>
		</div>
	</main>
	<script type="text/javascript" src="<?=base_url('public/js/card.js')?>"></script>
</body>
</html>