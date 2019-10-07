<header>
	<div class="conatiner-header">
		<div class="nav-container">
			<div class="container-logo-header">
				<a href="<?=base_url('painel') ?>"><img src="<?=base_url('public/img/logo.webp')?>"></a>
			</div>
			<div class="burger">
				<i id="abrir" class="material-icons">menu</i>
			</div>
		</div>
		
		<nav id="nav">
			<ul>
				<?php if($_SERVER['PATH_INFO'] != '/painel'): ?>
					<li><a href="<?=base_url('painel') ?>">Atletas</a></li>
				<?php endif; ?>
				<?php if($_SERVER['PATH_INFO'] != '/turmas'): ?>
					<li><a href="<?=base_url('turmas') ?>">Turmas</a></li>
				<?php endif; ?>
				<li>Cadastros
					<ul>
						<li><a href="<?=base_url('professores') ?>">Professores</a></li>
						<li><a href="<?=base_url('usuarios') ?>">Usuários</a></li>
						<li><a href="<?=base_url('unidades') ?>">Unidades</a></li>
						<li><a href="<?=base_url('instituicoes') ?>">Escolas</a></li>
					</ul>
				</li>
				<li><a href="<?=base_url('suporte') ?>">Suporte</a></li>				
				<li class="maker"><a href="<?=base_url('sair') ?>">Sair</a></li>
			</ul>
		</nav>
	</div>
</header>