<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Cadastrar unidade - Ginas Louquinhos</title>
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
				<h1>Cadastrar unidade</h1>
			</div>
			<form action="<?=base_url('unidades/cadastrar/salvar') ?>" method='post'>
				<div class="container-input">
					<label for="polo_unidade">Nome unidade:</label>
					<input type="text" name="polo_unidade" id="polo_unidade">
				</div>
				<div class="container-input">
					<input type="submit" value="Cadastrar unidade - polo" >
				</div>
			</form>
		</div>
	</main>
	<script type="text/javascript" src="<?=base_url('public/js/card.js')?>"></script>
</body>
</html>