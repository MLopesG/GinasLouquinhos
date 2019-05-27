<?php	defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Painel - Ginas Louquinhos</title>
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
			<p>Atleta será excluido do banco de dados.</p>
		</div>
		<div class="container">
			<div class="container-titulo">
				<h1>Alunos( <b><?=$total ?></b> - atletas) </h1>
			</div>
			<?php if($this->session->flashdata('messagem')): ?>
				<div class="erros">
					<p><?=$this->session->flashdata('messagem') ?></p>
				</div>
			<?php endif;  ?>
			<details>
				<summary>Filtrar atletas</summary>
				<div class="container-filter">
				<form  action="<?=base_url('filtro/pesquisa');?>" method="post">
					<div class="container-input">
						<div>
							<select name="tipo_pesquisa">
								<option>Selecionar pesquisa</option>
								<option>Data nascimento</option>
								<option>Sexo</option>
								<option>Unidade</option>
								<option>Atleta</option>
								<option>Instituição de ensino</option>
							</select>
						</div>
						<div>
							<input type="text" name="pesquisa" placeholder="Exemplo de pesquisa: Data de nascimento 1999-02-12, Sexo: Masculino ou Feminino e Unidade DOURADÃO,UNIGRAN  e Retirou Camiseta ">
						</div>
						<input type="submit" value="Filtrar" >
					</div>
				</form>
				
			</div>
			</details>
			<?php  foreach ($atletas as $atleta):?>
				<div>
					<button class="accordion"><?=$atleta->nome_atleta?></button>
					<div class="panel">
					  <ul>
					  	<li>
							<a onclick="excluir('<?=base_url("atleta/deletar/$atleta->id_aluno_atleta")?>')">Deletar</a>
							<a href="<?=base_url("atleta/editar/$atleta->id_aluno_atleta");?>">Editar</a>
						</li>
					  	<li>Unidade: <?=$atleta->unidade?></li>
					  	<li>Nome completo: <?=$atleta->nome_atleta?></li>
						<li>RG: <?=$atleta->rg_atleta?></li>
						<li>CPF: <?=$atleta->cpf_atleta?> </li>
						<li>Data Nascimento: <?=date('d/m/Y', strtotime($atleta->data_nascimento_atleta));?> </li>
						<li>Sexo: <?=$atleta->sexo_atleta?> </li>
						<li>Nome responsável: <?=$atleta->responsavel?> </li>
						<li>CPF responsável: <?=$atleta->cpf_responsavel?> </li>
						<li>E-mail responsável:<?=$atleta->email_responsavel?> </li>
						<li>Parentesco: <?=$atleta->parentesco_responsavel?> </li>
						<li>RG responsável: <?=$atleta->rg_responsavel?></li> 
						<li>Contato: <?=$atleta->cel_responsavel?></li>
						<li>Data efetuado em: <?=date('d/m/Y', strtotime($atleta->data_cadastro));?></li>
						<li>Instituição de ensino: <?=$atleta->nome_instituicao_ensino?></li>  
						<li>Autorizo a sua participação nas aulas de Ginástica Artística do Projeto Ginas louquinhos nos <b>dias:</b> <?=$atleta->dias_participacao?> <b>Horário</b> <?=$atleta->horario_participacao?> </li>
					 </ul>
					</div>
				</div>
			<?php endforeach ?>
			<div class="pagination">
				<?php if(!empty($links)): ?>
				<p><?=$links; ?></p>
				<?php endif; ?>
			</div>

			<div class="btn-container">
				<a href="<?=base_url('painel/relatorios') ?>">Relatórios - registros</a>
			</div>
		</div>
	</main>
	<script type="text/javascript" src="<?=base_url('public/js/card.js')?>"></script>
</body>
</html>