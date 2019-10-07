  
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
	<script src="<?=base_url('public/vendor/main.min.js') ?>"></script>
	<script src="<?=base_url('public/vendor/FileSaver.min.js') ?>"></script>
	<script src="<?=base_url('public/vendor/jszip-utils.js') ?>"></script>
	<script type="text/javascript" src="<?=base_url('public/js/termo.js')?>"></script>
</head>
<body>
	<?php include('public/componentes/header.inc.php');?>
	<main>
		<div id="messagem" title="Deseja excluir atleta?">
			<p>Atleta será excluido do banco de dados.</p>
		</div>
		<div class="container">
			
			<div class="container-titulo">
				<h1>(<?=count($atletas)?>) - Alunos cadastro na turma</h1>
				<div class="erros">
					<p>Professor:<?=$atletas[0]->nome_professor?></p>
					<p>Dias: <?=$atletas[0]->dias_semanais?></p>
					<p>Unidade:<?=$atletas[0]->polo_unidade?></p>
					<p>Horário: <?=$atletas[0]->horario_inicio?> às <?=$atletas[0]->horario_final?></p>
					<p>Periodo: <?=$atletas[0]->turno?></p>
					<p>Vagas: <?=$atletas[0]->quantidade_vagas?> - alunos</p>
					<p>Vagas restantes: (<?=$atletas[0]->quantidade_vagas - qtd_alteta_turma($atletas[0]->id_turma)?>)  - alunos</p>
				</div>
				<div class="btn-container recursos">
					<div>
						<a href="<?=base_url("turmas/relatorio/aluno/".$atletas[0]->id_turma."");?>">Relátorio turma</a>
		  				<a href="<?=base_url("turmas/ficha-chamada/".$atletas[0]->id_turma."") ?>">Ficha de frequência</a>
					</div>
				</div>
			</div>

			<?php if($this->session->flashdata('messagem')): ?>
				<div class="erros">
					<p><?=$this->session->flashdata('messagem') ?></p>
				</div>
			<?php endif;  ?>
			
			<?php  foreach ($atletas as $atleta):?>
				<div>
					<button class="accordion"><?=$atleta->nome_atleta?></button>
					<div class="panel">
					  <ul>
					  	<li>Unidade: <?=$atleta->polo_unidade?></li>
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
						<li>Professor(a) turma: <?=$atleta->nome_professor?></li>
						<li>Autorizo a sua participação nas aulas de Ginástica Artística do Projeto Ginas louquinhos nos <b>dias:</b> <?=$atleta->dias_semanais?> <b>Horário</b> <?=$atleta->horario_inicio?> às  <?=$atleta->horario_final?> no periodo <?=$atleta->turno?>.</li>
						<li class="btns">
							<a onclick="excluir('<?=base_url("atleta/deletar/$atleta->id_aluno_atleta")?>')">Excluir Atleta</a>
							<a href="<?=base_url("atleta/editar/$atleta->id_aluno_atleta");?>">Alterar dados</a>
							<a onclick='print_termo(<?=json_encode($atleta)?>)'>Imprimir termo</a>
						</li>
					 </ul>
					</div>
				</div>
			<?php endforeach ?>
		</div>
	</main>
	<script type="text/javascript" src="<?=base_url('public/js/card.js')?>"></script>
</body>
</html>