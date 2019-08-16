<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Ficha de frequência - Ginas Louquinhos</title>
	<meta charset="utf-8">
	<link rel="shortcut icon" href="<?=base_url('public/img/índice.png');?>" type="image/png"/>
	<link rel="stylesheet" type="text/css" href='<?=base_url('public/css/lista_chamada.css');?>'>
	<script type="text/javascript" src="<?=base_url('public/js/imprimir.js');?>"></script>
	<?php include('public/componentes/validar_login.inc.php');?>
</head>
<body>
	<header>
		<div class="btn-container">
			<a onClick="printdiv('div_print')">Imprimir ficha de frequência</a>
			<a href="<?=base_url('turmas') ?>">Página inicial</a>
			<p>Recurso tem como objetivo em auxiliar na gerencia de ficha de frequência, com informações automáticas, como: datas, alunos, turma e professores. Lembrando, a funcionalidade está em teste, qualquer problema, entrar em contato com suporte.</p>
		</div>
	</header>
	
	<main id="div_print">
		<div class="cabeçalho">
			<img src="<?=base_url('public/img/geral.png') ?>">
		</div>
		<div class="sub-cabeçalho">
			<div class="logo-2">
				<img src="<?=base_url('public/img/1.png') ?>">
			</div>
			<div class="titulo">
				<h1>Programa Escolar de Formação e Desenvolvimento Esportivo de MS</h1>
				<h2>FICHA DE FREQUENCIA DOS ALUNOS - 2019</h2>
			</div>
		</div>
		<div class="informações">
			<div class="dados-campo">
				<p>Escola Estadual:  <b><?=$turma[0]->nome_instituicao_ensino ?></b></p>
				<p>Municipal: <b>Dourados</b></p>
			</div>
			<div class="dados-campo">
				<p>Professor: <b><?=$turma[0]->nome_professor ?></b></p>
			</div>
			<div class="dados-campo">
				<p>Modalidade: <b>Ginástica artística</b> </p>
				<p>Naipe: <b>( ) Masc  ( ) Fem  ( ) Misto</b></p>
			</div>
			<div class="dados-campo">
				<p>Turma:<b><?=$turma[0]->dias_semanais ?></b></p>
				<p>Horário: <b><?=$turma[0]->horario_inicio ?> às <?=$turma[0]->horario_final ?></b></p>
				<p>Mês: <?=$mes?></p>
			</div>
		</div>
		<div class="tabela">
			<table  cellpadding="0" cellspacing="0" >
			   <thead>
			   	 <tr>
			        <th  rowspan="2" width="100">Nº</th>
			        <th colspan="4" rowspan="2">Nome dos Aluno</th>
			        <th colspan="<?=count($data_para_chamada)?>">Dia</th>
			        <th rowspan="2" width="100">Total de faltas</th>
			    </tr>
			    <tr>
			    <?php foreach ($data_para_chamada as  $data):?>
			        <th><p class="vertical"><?=$data?></th>
			    <?php endforeach; ?>
			    </tr>
			   </thead>
			  <tbody>
			  	<?php foreach ($turma as $key => $aluno):?>
			  	  <tr>
			    	<td><?=$key+1 ?></td>
			    	<td colspan="4"><?=$aluno->nome_atleta?></td>
			    	<?php for ($i=0; $i < count($data_para_chamada); $i++): ?>
			    		<td></td>
			    	<?php endfor; ?>
			    	<td></td>
			    </tr>
				<?php endforeach; ?>
			  </tbody>
			</table>
		</div>
		<div class="obaservação">
			<p> Observações: _________________________________________________________________________________________________________________</p>
			<p>_________________________________________________________________________________________________________________</p>
		</div>
		<div class="assinatura">
			<div>
				<p>__________________________________________</p>
				<span>Assinatura do(a) Professor(a)</span>
			</div>
			<div>
				<p>__________________________________________</p>
				<span>Carimbo e Assinatura da Direção Escolar</span>
			</div>
		</div>
		<div class="dados-fim-form">
			<p>Avenida Mato Grosso 5778 – Bloco III – Campo Grande-MS – CEP 79031-001 – Fone (067) 3323-7209</p>
			<a href="http://www.fundesporte.ms.gov.br">e-mail nesp.sedms@gmail.com e Home Page  www.fundesporte.ms.gov.br</a>
		</div>
	</main>
</body>
</html>