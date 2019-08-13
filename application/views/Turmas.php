<?php	defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Turmas - Ginas Louquinhos</title>
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
			<p>Turma será excluido do banco de dados.</p>
		</div>
		<div class="container">
			<div class="container-titulo">
				<h1>Turmas (<b><?=count($turmas) ?> - Abertas</b>)</h1>
			</div>
			<?php if($this->session->flashdata('messagem')): ?>
				<div class="erros">
					<p><?=$this->session->flashdata('messagem') ?></p>
				</div>
			<?php endif;  ?>
			<div>
				<details>
					<summary>Filtro turmas</summary>
					<div class="container-filter">
						<form  action="<?=base_url('turmas/pesquisa');?>" method="post">
							<div class="container-input">
								<div>
									<select name="tipo_pesquisa">
										<option>Selecionar pesquisa</option>
										<option>Horário inicio</option>
										<option>Periodo</option>
										<option>Dias da semana</option>
										<option>Professor(a)</option>
										<option>Unidade</option>
									</select>
								</div>
								<div>
									<input type="text" name="pesquisa" placeholder="Exemplo de pesquisa: Periodo: Matutino ou Vespertino, Horário: 18:00:00, Dias: Sexta ou Sexta Quarta, Polo: Unigran ou Douradão">
								</div>
								<input type="submit" value="Filtrar" >
							</div>
						</form>
					</div>
				</details>
			</div>
			<div class="legenda">
				 <ul>
				 	<li class="legenda_danger">Vagas esgotadas</li>
				 	<li class="legenda_warning">Vagas esgotando</li>
				 	<li class="legenda_livre">Vagas disponiveis</li>
				 </ul>
			</div>
			<?php  foreach ($turmas as $turma):?>
				<?php if(qtd_alteta_turma($turma->id_turma) >= $turma->quantidade_vagas): ?>
					<div>
						<button class="accordion danger">Professor(a) : <?=$turma->nome_professor?> - Dias: <?=$turma->dias_semanais?> - Unidade: <?=$turma->polo_unidade?></button>
				<?php elseif(qtd_alteta_turma($turma->id_turma) >= ($turma->quantidade_vagas/2) and qtd_alteta_turma($turma->id_turma) <=$turma->quantidade_vagas): ?>
					<div>
						<button class="accordion warning">Professor(a) : <?=$turma->nome_professor?> - Dias: <?=$turma->dias_semanais?> - Unidade: <?=$turma->polo_unidade?></button>
				<?php else: ?>
					<div>
						<button class="accordion">Professor(a) : <?=$turma->nome_professor?> - Dias: <?=$turma->dias_semanais?> - Unidade: <?=$turma->polo_unidade?></button>
				<?php endif; ?>
					<div class="panel">
						  <ul>
						  	<li><b>Código turma:<?=$turma->id_turma?></b></li>
						  	<li><b>Professor(a):  <?=$turma->nome_professor?></b></li>
						  	<?php if(qtd_alteta_turma($turma->id_turma) > 0): ?>
						  		<li>Vagas utilizadas: (<?=qtd_alteta_turma($turma->id_turma)?>) - Alunos</li>
						 	 <?php endif ?>
						 	<li>Atletas suportados: (<?=$turma->quantidade_vagas?>) - Alunos</li>
						 	<li>Vagas restantes: (<?=$turma->quantidade_vagas - qtd_alteta_turma($turma->id_turma)?>) - Alunos</li>
						  	<li>Turno: <?=$turma->turno?> </li>
						  	<li>Horário inicio da aula: <?=$turma->horario_inicio?> </li>
						  	<li>Horário final da aula: <?=$turma->horario_final?> </li>
						  	<li>Dias da semana: <?=$turma->dias_semanais?> </li>
						  	<li>Unidade: <?=$turma->polo_unidade?> </li>
						  	<li>Endereço Unidade:<?=$turma->endereco?> </li>
						  	<li class="btns">
						  		<a href="<?=base_url("turmas/editar/$turma->id_turma");?>">Alterar dados</a>
						  		<a href="<?=base_url("turmas/lista-alunos/$turma->id_turma");?>">Lista de alunos</a>
						  		<a href="<?=base_url("turmas/relatorio/aluno/$turma->id_turma");?>">Relátorio Turma</a>
						  		<?php if(qtd_alteta_turma($turma->id_turma) == 0): ?>
						  			<a onclick="excluir('<?=base_url("turmas/deletar/$turma->id_turma")?>')">Excluir turma</a>
						  		<?php else: ?>
						  			<b>Não é possivel excluir turma quando há atletas cadastrados.</b>
						  		<?php endif ?>
						  	</li>	
						  </ul>
						</div>
					</div>
			<?php endforeach ?>
			<div class="btn-container">
				<a href="<?=base_url('turmas/cadastro') ?>">Cadastrar(abrir) turma</a>
			</div>
		</div>
	</main>
	<script type="text/javascript" src="<?=base_url('public/js/card.js')?>"></script>
</body>
</html>