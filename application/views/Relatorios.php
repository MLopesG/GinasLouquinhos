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
		<div class="container">
			<div class="container-titulo">
				<h1>Relatório - Encontrados: <b><?=$total ?></b></h1>
			</div>
			<?php if($this->session->flashdata('messagem')): ?>
				<div class="erros">
					<p><?=$this->session->flashdata('messagem') ?></p>
				</div>
			<?php endif;  ?>
				<div class="container-filter">
				<form  action="<?=base_url('filtro/pesquisa/relatorio');?>" method="post" id='form_filter'>
					<div class="container-input">
						<div>
							<select name="tipo_pesquisa" onchange="form_idade(this.value)">
								<option>Selecionar pesquisa</option>
								<option >faixaetária de idade</option>
								<option>data nascimento</option>
								<option>sexo</option>
								<option>unidade</option>
								<option>instituição de ensino</option>
							</select>
						</div>
						<div>
							<input type="text" name="pesquisa" placeholder="Exemplo de pesquisa: Data de nascimento 1999-02-12, Sexo: Masculino ou Feminino e Unidade DOURADÃO,UNIGRAN  e Retirou Camiseta ">
						</div>
						<input type="submit" value="Filtrar" >
					</div>
				</form>
				<form  action="<?=base_url('filtro/pesquisa/relatorio/idade');?>" method="post" id='form_filter_idade'>
					<div class="container-input">
						<div>
							<label>Idade minima:</label>
							<input type="text" name="idade_1">
						</div>
						<div>
							<label>Idade maxima:</label>
							<input type="text" name="idade_2">
						</div>
						<input type="submit" value="Filtrar" >
					</div>
				</form>
			</div>
			<?php if(!empty($pesquisa)): ?>
			<table id="HTML">
				<caption class="title">Relatório  <?=$pesquisa ?></caption>
				<thead>
					<tr>
						<th>Alunos</th>
						<th><?=$pesquisa ?></th>
					</tr>
				</thead>
				<tbody>
					<?php  foreach ($atletas as $atleta):?>
						<tr>
							<td><?=$atleta->nome_atleta ?></td>
							<td><?=$atleta->categoria ?></td>
						</tr>
					<?php endforeach ?>
				</tbody>
				<tfoot>
					<tr>
						<td><b>Atletas registrados:</b></td>
						<td><b><?=count($atletas) ?></b></td>
					</tr>
				</tfoot>
			</table>
			<div class="btn-container">
				<a onclick="Gerar_pdf()">Gerar - PDF</a>
			</div>
			<?php endif; ?>
		</div>
	</main>
	<script src="<?=base_url('public/js/jspdf.min.js')?>"></script>
	<script src="<?=base_url('public/js/jspdf.plugin.autotable.js')?>"></script>
	<script src="<?=base_url('public/js/PDF.js')?>"></script>
	<script type="text/javascript" src="<?=base_url('public/js/card.js')?>"></script>
</body>
</html>