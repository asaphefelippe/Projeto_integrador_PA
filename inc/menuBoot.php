<style>
	* {
		margin: 0;
		padding: 0;
		box-sizing: border-box;
	}

	a {
		text-decoration: none;
		width: 100%;
		height: 100%;
		font-family: 'Open Sans';
		font-size: 14px;
		cursor: default;
		color: #838ea7;
	}

	nav {
		width: 100%;
		background-color: #FEFEFE;
		border-radius: 2px;
		display: inline-block;
		height: 50px;
		line-height: 50px;
		width: 300px;
		z-index: 100;
	}

	nav ul li ul {
		display: none;
		/* margin-top: 20px; */
	}

	nav ul li ul li {
		display: block;
		width: 300px;
		z-index: 100;
	}

	nav ul li ul li:hover {
		background-color: #F4F4F4;
	}

	nav ul li ul li svg {
		margin-left: 20px;
		margin-right: 20px;
	}

	nav li li {
		background-color: #FEFEFE;
	}

	.home {
		border-top-left-radius: 1px;
		border-top-right-radius: 1px;
		border-bottom: 1px #d7d9dd solid;
		position: relative;
	}

	.home svg {
		width: 20px;
		height: 20px;
		position: relative;
		top: 4px;
	}

	.home:hover a {
		color: #6d6c6c;
	}

	.home:hover .blue-box {
		background-color: #3FA6FD;
		position: absolute;
		margin-left: 0;
		height: 100%;
		width: 4px;
	}

	.home:hover #home {
		fill: #6d6c6c;
	}

	.settings {
		border-bottom-left-radius: 1px;
		border-bottom-right-radius: 1px;
		border-top: 1px #d7d9dd solid;
	}

	.settings svg {
		width: 20px;
		height: 20px;
		position: relative;
		top: 4px;
	}

	.settings:hover a {
		color: #6d6c6c;
	}

	.settings:hover .blue-box {
		background-color: #3FA6FD;
		position: absolute;
		margin-left: 0;
		height: 100%;
		width: 4px;
	}

	.settings:hover #gear {
		fill: #6d6c6c;
	}

	.messages:hover a {
		color: #6d6c6c;
	}

	.messages:hover .blue-box {
		background-color: #3FA6FD;
		position: absolute;
		margin-left: 0;
		height: 100%;
		width: 4px;
	}

	.messages:hover #mail {
		fill: #6d6c6c;
	}

	.hamburger {
		margin-right: 20px;
		margin-left: 20px;
	}

	.arrow {
		width: 0;
		height: 0;
		margin-left: 275px;
		border-right: 9px solid transparent;
		border-left: 9px solid transparent;
		border-bottom: 9px solid #FEFEFE;
		position: absolute;
		top: -9px;
	}

	.fa-chevron-up {
		margin-left: 110px;
	}

	.marked {
		background-color: #3FA6FD;
		border-radius: 2px;
	}

	.marked1 {
		color: #ffffff;
	}

	.rotate {
		moz-transition: all 0.3s linear;
		webkit-transition: all 0.3s linear;
		transition: all 0.3s linear;
	}

	.rotate.down {
		moz-transform: rotate(180deg);
		webkit-transform: rotate(180deg);
		transform: rotate(180deg);
	}

	.icons {
		width: 50px;
		height: 50px;
	}

	.d-flex {
		display: flex;
		width: 100%;
	}

	/*# sourceMappingURL=main.css.map */
</style>
<html>

<head>
	<meta charset="utf-8">
	<title></title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<meta name="viewport" content="width=device-width" />
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<nav>
	<ul>
		<li class="" id="dropMenu">
			<div class="drop-box">
				<a class="drop-text" href="#"><i class="hamburger fa fa-bars" aria-hidden="true"></i>Dropdown menu<i class="fa fa-chevron-up rotate"></i></a>
			</div>
			<ul id="ul">
				<a href="../admin/altBebidas.php">
					<div class="d-flex">
						<li>Alterar Bebidas</li>
					</div>
				</a>

				<a href="../admin/altComida.php">
					<div class="d-flex">
						<img src="../assets/images/troca.jpeg"class="icons" alt="">
						<li>Alterar Comidas</li>
					</div>
				</a>
				<a href="../admin/altCupons.php">
					<div class="d-flex">
					<img src="../assets/images/troca.jpeg"class="icons" alt="">

						<li>alterar Cupons</li>
					</div>
				</a>
				<a href="../admin/altUsuario.php">
					<div class="d-flex">
					<img src="../assets/images/troca.jpeg"class="icons" alt="">

						<li>Alterar Usuarios</li>
					</div>
				</a>
				<a href="../admin/cadastraBebida.php">
					<div class="d-flex">
						<img src="../assets//images/mais.jpeg" class="icons" alt="">
						<li>Cadastrar Bebidas</li>
					</div>
				</a>
				<a href="../admin/cadastraComida.php">
					<div class="d-flex">
						<img src="../assets//images/mais.jpeg" class="icons" alt="">
						<li>Cadastrar Comidas</li>
					</div>
				</a>
				<a href="../admin/cadastraCupons.php">
					<div class="d-flex">
						<img src="../assets//images/mais.jpeg" class="icons" alt="">
						<li>Cadastrar Cupons</li>
					</div>
				</a>
				<a href="../admin/listBebidas.php">
					<div class="d-flex">
					<img src="../assets/images/lista.jpge.jpg"class="icons" alt="">
						<li>Lista De Bebidas</li>
					</div>
				</a>
				<a href="../admin/listComida.php">
					<div class="d-flex">
						<img src="../assets/images/lista.jpge.jpg"class="icons" alt="">
						<li>Lista De Comidas</li>
					</div>
				</a>
				<a href="../admin/listCupons.php">
					<div class="d-flex">
						<img src="../assets/images/lista.jpge.jpg" class="icons"alt="">

						<li>Lista De Cupons</li>
					</div>
				</a>
				<a href="../admin/listUsuario.php">
					<div class="d-flex">
						<img src="../assets/images/lista.jpge.jpg"class="icons" alt="">

						<li>Lista De Usuarios</li>
					</div>
				</a>
				<a href="../admin/gastaPontos.php">
					<div class="d-flex">
					<img src="../assets/images/S.png"class="icons" alt="">
						<li>Gastar Pontos</li>
					</div>
				</a>
				<a href="../admin/telaADM2.php">
					<div class="d-flex">
					<img src="../assets/images/casa.jpg"class="icons" alt="">

						<li>Tela Principal Admin</li>
					</div>
				</a>
			</ul>
		</li>
	</ul>
</nav>
<script type="text/javascript" src="js/scripts.js"></script>

</html>

<script>
	$(function() {

		$('.drop-box').click(function() {
			$('#ul')
				.fadeToggle();
		});

		$('.drop-box').on('click', function() {
			$(this).toggleClass('marked');
			$('.drop-text').toggleClass('marked1');
		});

		$(".drop-box").click(function() {
			$('.rotate').toggleClass("down");
		});
	});
</script>