<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Acessar painel - Ginas Louquinhos</title>
	<meta charset="utf-8">
	<link rel="shortcut icon" href="<?=base_url('public/img/índice.png');?>" type="image/png"/>
	<link rel="stylesheet" type="text/css" href='<?=base_url('public/css/style.css');?>'>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	<main class="container-login">
		<div class="container-logo">
			<img src="<?=base_url('public/img/logo.webp')?>">
		</div>
		<form action="<?=base_url('entrar');?>" method="post">
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
			<div class="container-input">
				<label for="e-mail">E-mail:</label>
				<input type="email" name="e-mail" id="e-mail" required>
			</div>
			<div class="container-input">
				<label for="senha">Senha:</label>
				<input type="password" name="senha" id="senha">
			</div>
			<div class="container-input">
				<input type="submit" value="Entrar">
			</div>
		</form>
	</main>
</body>
</html>