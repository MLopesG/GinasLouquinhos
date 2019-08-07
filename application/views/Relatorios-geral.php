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
			<div class="btn-container margin">
				<a onclick="Gerar_pdf()">Gerar documento - PDF</a>
			</div>
			<table id="HTML">
				<caption class="title">Relatório geral (<?=count($atletas) ?> - atletas)</caption>
				<thead>
					<tr>
						<th>Aluno</th>
						<th>Sexo</th>
						<th>Data nasc.</th>
						<th>Unidade</th>
					</tr>
				</thead>
				<tbody>
					<?php  foreach ($atletas as $atleta):?>
						<tr>
							<td><?=$atleta->nome_atleta ?></td>
							<td><?=$atleta->sexo_atleta ?></td>
							<td><?=$atleta->data_nascimento_atleta ?></td>
							<td><?=$atleta->unidade ?></td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</main>
	<script src="<?=base_url('public/js/jspdf.min.js')?>"></script>
	<script src="<?=base_url('public/js/jspdf.plugin.autotable.js')?>"></script>
	<script src="<?=base_url('public/js/PDF.js')?>"></script>
	<script type="text/javascript" src="<?=base_url('public/js/card.js')?>"></script>
</body>
</html>