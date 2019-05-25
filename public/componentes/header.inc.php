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
					<?php if($_SERVER['PATH_INFO'] != '/usuarios'): ?>
						<li><a href="<?=base_url('usuarios') ?>">Usuários</a></li>
					<?php endif; ?>
					<?php if($_SERVER['PATH_INFO'] != '/instituicoes'): ?>
						<li><a href="<?=base_url('instituicoes') ?>">Instituições</a></li>
					<?php endif; ?>
					<?php if($_SERVER['PATH_INFO'] != '/atleta/cadastro'): ?>
						<li><a href="<?=base_url('atleta/cadastro') ?>">Cadastrar atleta</a></li>
					<?php endif; ?>
					<li><a href="<?=base_url('sair') ?>">Sair</a></li>
				</ul>
			</nav>
		</div>
	</header>