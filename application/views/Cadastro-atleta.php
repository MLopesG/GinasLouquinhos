<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Cadastro atleta - Ginas Louquinhos</title>
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
			<div class="titulação-form">
				<h1>TERMO DE AUTORIZAÇÃO, RESPONSABILIDADES E CESSÃO DE DIREITOS DO ALUNO / ATLETA</h1>
			</div>
			<form method="post" action="<?=base_url('atleta/cadastro/salvar')?>">
				<div class="container-divisão-form">
					<div class="container-checkbox">
						<label for="Unidade">Unidade:</label>
						<div>
							<input type="checkbox" name="unidade" value="DOURADÃO">DOURADÃO
						</div>
						<div>
							<input type="checkbox" name="unidade" value="UNIGRAN">UNIGRAN
						</div>
						<div>
							<input type="checkbox" name="unidade" value="RETIROU A CAMISETA">Retirou Camiseta
						</div>
					</div>
				</div>
				<div class="container-divisão-form">
					<legend>Dados Cadastrais do Aluno-atleta</legend>
					<div class="container-input">
						<label for="nome_atleta">Nome:</label>
						<input type="text" name="nome_atleta" id="nome_atleta">
					</div>
					<div class="container-input">
						<label for="rg_atleta">RG:</label>
						<input type="text" name="rg_atleta" id="rg_atleta">
					</div>
					<div class="container-input">
						<label for="cpf_atleta">CPF:</label>
						<input type="cpf" name="cpf_atleta" id="cpf_atleta" maxlength="11">
					</div>
					<div class="container-input">
						<label for="data_nascimento_atleta">Data nascimento:</label>
						<input type="date" name="data_nascimento_atleta" id="data_nascimento_atleta">
					</div>
					<div class="container-input">
						<label for="sexo_atleta">Sexo:</label>
						<select name="sexo_atleta" id="sexo_atleta">
							<option value="">Selecionar sexo</option>
							<option value="Masculino">Masculino</option>
							<option value="Feminino">Feminino</option>
						</select>
					</div>
					<div class="container-input">
						<label for="id_instituicao_ensino">Instituição de ensino:</label>
						<select name="id_instituicao_ensino" id="id_instituicao_ensino">
							<option value="">Instituição de ensino</option>
							nome_instituicao_ensino ?></option>
							<?php foreach ($instituicao_ensino as $ensino):?>
								<option value="<?=$ensino->id_instituicao_ensino?>"><?=$ensino->nome_instituicao_ensino?></option>
							<?php endforeach ?>
						</select>
					</div>
				</div>
				<div class="container-divisão-form">
					<legend>Dados Cadastrais do Responsável Legal</legend>
					<div class="container-input">
						<label for="responsavel">Responsável</label>
						<input type="text" name="responsavel" id="responsavel">
					</div>
					<div class="container-input">
						<label for="rg_responsavel">RG:</label>
						<input type="text" name="rg_responsavel" id="rg_responsavel">
					</div>
					<div class="container-input">
						<label for="parentesco_responsavel">Parentesco:</label>
						<input type="text" name="parentesco_responsavel" id="parentesco_responsavel">
					</div>
					<div class="container-input">
						<label for="cpf_responsavel">CPF:</label>
						<input type="text" name="cpf_responsavel" id="cpf_responsavel"  maxlength="11">
					</div>
					<div class="container-input">
						<label for="email_responsavel">Email:</label>
						<input type="email" name="email_responsavel" id="email_responsavel" required>
					</div>
					<div class="container-input">
						<label for="cel_responsavel">Cel:</label>
						<input type="text" name="cel_responsavel" id="cel_responsavel">
					</div>
				</div>
				<div class="container-divisão-form">
					<p>Autorizo a sua participação nas aulas de Ginástica Artística do Projeto Ginaslouquinhos nos:</p>
					<div class="container-input">
						<label>Dias</label>
						<input type="text" name="dias_participacao">
					</div>
					<div class="container-input">
						<label>Horário</label>
						<input type="time" name="horario_participacao">
					</div>
				</div>
				<div class="container-input">
						<label for="data_cadastro">Data cadastro:</label>
						<input type="date" name="data_cadastro" id="data_cadastro">
				</div>
				<div class="container-input">
					<input type="submit" value="Cadastrar atleta">
				</div>
			</form>
		</div>
	</main>
	<script type="text/javascript" src="<?=base_url('public/js/card.js')?>"></script>
</body>
</html>