<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Google Nexus Website Menu</title>
	<meta name="description" content="A sidebar menu as seen on the Google Nexus 7 website" />
	<meta name="keywords" content="google nexus 7 menu, css transitions, sidebar, side menu, slide out menu" />
	<meta name="author" content="Codrops" />
	<link rel="shortcut icon" href="../favicon.ico">
	<link rel="stylesheet" type="text/css" href="css/normalize.css" />
	<link rel="stylesheet" type="text/css" href="css/demo.css" />
	<link rel="stylesheet" type="text/css" href="css/component.css" />
	<script src="js/modernizr.custom.js"></script>
</head>
<body>
	<div class="container">
		<ul id="gn-menu" class="gn-menu-main">
			<li class="gn-trigger">
				<a class="gn-icon gn-icon-menu"><span>Menu</span></a>
				<nav class="gn-menu-wrapper">
					<div class="gn-scroller">
						<ul class="gn-menu">
							<li><a href="../admin/altBebidas.php">Alterar bebidas</a></li>
							<li><a href="../admin/altComida.php">Alterar comidas</a></li>
							<li><a href="../admin/altCupons.php">Alterar cupons</a></li>
							<li><a href="../admin/altUsuario.php">Alterar usuarios</a></li>
							<li><a href="../admin/cadastraComida.php">Cadastrar comidas</a></li>
							<li><a href="../admin/cadastraBebidas.php">Cadastrar bebidas</a></li>
							<li><a href="../admin/cadastraCupons.php">Cadastrar cupons</a></li>
							<li><a href="../admin/listUsuario.php">Lista de usuario</a></li>
							<li><a href="../admin/listComida.php">Lista de comidas</a></li>
							<li><a href="../admin/listBebidas.php">Lista de bebidas</a></li>
							<li><a href="../admin/listCupons.php">Lista de cupons</a></li>
							<li><a href="../admin/telaADM2.php">Tela principal ADM</a></li>
							<li><a href="../admin/gastaPontos.php">Tela gastar pontos</a></li>
						</ul>
					</div><!-- /gn-scroller -->
				</nav>
			</li>
		</ul>
	</div><!-- /container -->
	<script src="js/classie.js"></script>
	<script src="js/gnmenu.js"></script>
	<script>
		new gnMenu(document.getElementById('gn-menu'));
	</script>
</body>

</html>