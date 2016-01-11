<header id="header" class="clearfix">
		<h1 class="logo fl">Doce magia</h1>
		<div class="user fr">
			<img src="../imagens/usuario/<?php $sql = mysql_query("SELECT * FROM users WHERE login = '".$_SESSION['login']."' ");
			$resultado = mysql_fetch_array($sql);
			$foto = $resultado['foto']; echo $foto; ?>" alt="" class="img-user fl">
			<span class="icon-menu-user fr"></span>
			<ul class="menu-user">
				<li class="titulo-divisor list-menu-header"><span class="name-user"><?php $sql = mysql_query("SELECT * FROM users WHERE login = '".$_SESSION['login']."' ");
			$resultado = mysql_fetch_array($sql);
			$idUser = $resultado['id'];
			$nome = $resultado['nome']; echo $nome; ?></span></li>
				<li class="list-menu-header"><a href="index.php?idUser=<?php echo $idUser ?>" class="editar">Editar Perfil</a></li>
				<li class="list-menu-header"><a href="sair.php" class="sair">Sair</a></li>
			</ul>
		</div>
	</header>