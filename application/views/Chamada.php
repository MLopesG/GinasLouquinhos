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
	<link media="print" rel="Alternate" href="print.pdf">
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
				<h2>FICHA DE FREQUENCIA DOS ALUNOS - <?=date('Y') ?></h2>
			</div>
		</div>
		<div class="informações">
			<div class="dados-campo">
				<p>Escola Estadual:  <b><?=$informacoes_ficha['escola']?></b></p>
				<p>Municipal: <b>Dourados</b></p>
			</div>
			<div class="dados-campo">
				<p>Professor: <b><?=$informacoes_ficha['professor']?></b></p>
			</div>
			<div class="dados-campo">
				<p>Modalidade: <b>Ginástica artística</b> </p>
				<p>Naipe: <b>( ) Masc   ( ) Fem   (X) Misto</b></p>
			</div>
			<div class="dados-campo">
				<p>Turma:<b><?=$informacoes_ficha['turma'][0]->dias_semanais ?></b></p>
				<p>Horário: <b><?=$informacoes_ficha['turma'][0]->horario_inicio ?> às <?=$informacoes_ficha['turma'][0]->horario_final ?></b></p>
				<p>Mês: <?=$informacoes_ficha['mes']?></p>
				<p>Bimestre : <?=$informacoes_ficha['datas']?></p>
			</div>
		</div>
		<div class="responsive tabela">
			<table cellpadding="0" cellspacing="0" >
			   <thead>
			   	 <tr>
			        <th  rowspan="2" >Nº</th>
			        <th rowspan="2">Nome dos Aluno</th>
			        <th colspan="<?=count($informacoes_ficha['data_para_chamada'])?>">Dia</th>
			        <th rowspan="2" width="100">Total de faltas</th>
			    </tr>
			    <tr>
			    <?php foreach ($informacoes_ficha['data_para_chamada'] as  $data):?>
			        <th><p class="vertical"><?=$data?></th>
			    <?php endforeach; ?>
			    </tr>
			   </thead>
			  <tbody>
			  	<?php foreach ($informacoes_ficha['turma'] as $key => $aluno):?>
			  	  <tr>
			    	<td><?=$key+1 ?></td>
			    	<td ><?=$aluno->nome_atleta?></td>
			    	<?php for ($i=0; $i < count($informacoes_ficha['data_para_chamada']); $i++): ?>
			    		<td></td>
			    	<?php endfor; ?>
			    	<td></td>
			    </tr>
				<?php endforeach; ?>
			  </tbody>
			</table>
		</div>
		<div class="observação">
			<p> Observações: </p>
			<hr>
			<hr>
			<hr>
			<hr>
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
			<hr>
				<p>Avenida Mato Grosso 5778 – Bloco III – Campo Grande-MS – CEP 79031-001 – Fone (067) 3323-7209</p>
				<a href="http://www.fundesporte.ms.gov.br">e-mail nesp.sedms@gmail.com e Home Page  www.fundesporte.ms.gov.br</a>
			<hr>
		</div>
	</main>
</body>
</html>