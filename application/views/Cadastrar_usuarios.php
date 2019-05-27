<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Cadastrar Usuário - Ginas Louquinhos</title>
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
				<h1>Cadastrar Usuário</h1>
			</div>
			<form action="<?=base_url('usuarios/cadastrar/salvar') ?>" method='post'>
				<div class="container-input">
					<label for="nome_usuario">Nome Usuário</label>
					<input type="text" name="nome_usuario" id="nome_usuario">
				</div>
				<div class="container-input">
					<label for="email_usuario">E-mail Usuário</label>
					<input type="text" name="email_usuario" id="email_usuario" >
				</div>
				<div class="container-input">
					<label for="senha_usuario">Senha Usuário</label>
					<input type="senha" name="senha_usuario" id="senha_usuario" >
				</div>
				<div class="container-input">
					<label for="nivel_acesso">Nivel de acesso:</label>
					<select name="nivel_acesso" id="nivel_acesso">
						<option value="Visitante">Visitante</option>
						<option value="Admin">Admin</option>
					</select>
				</div>
				<div class="container-input">
					<input type="submit" value="Cadastrar" >
				</div>
			</form>
		</div>
	</main>
	<script type="text/javascript" src="<?=base_url('public/js/card.js')?>"></script>
</body>
</html>