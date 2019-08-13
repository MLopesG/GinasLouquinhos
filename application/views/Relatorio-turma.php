<?php	defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Relatorio turma - Ginas Louquinhos</title>
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
				<caption class="title">Relatório Turma</caption>
				<thead>
					<tr class="titulo_table">
						<th>Código</th>
						<th>Alunos</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($turma as $aluno):?>
						<tr>
							<td><?=$aluno->id_aluno_atleta ?></td>
							<td><?=$aluno->nome_atleta ?></td>
						</tr>
					<?php endforeach ?>
				</tbody>
				<tfoot>
					<tr>
						<th colspan="4">Professor:<?=$turma[0]->nome_professor ?></th>
					</tr>
					<tr>
						<th colspan="4">Dias da semana/periodo: <?=$turma[0]->dias_semanais ?> / <?=$turma[0]->turno?></th>
					</tr>
					<tr>
						<th colspan="4">Horário: <?=$turma[0]->horario_inicio ?> às <?=$turma[0]->horario_final ?></th>
					</tr>
					<tr>
						<th colspan="4">Unidade:<?=$turma[0]->polo_unidade?></th>
					</tr>
					<tr>
						<th colspan="4">Endereço:<?=$turma[0]->endereco ?></th>
					</tr>
				</tfoot>
			</table>
		</div>
	</main>
	<script src="<?=base_url('public/js/jspdf.min.js')?>"></script>
	<script src="<?=base_url('public/js/jspdf.plugin.autotable.js')?>"></script>
	<script src="<?=base_url('public/js/PDF.js')?>"></script>
	<script type="text/javascript" src="<?=base_url('public/js/card.js')?>"></script>
</body>
</html>