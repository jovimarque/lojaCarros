<?php
require_once("../helpers/connection.php");
$path = $_SERVER['REQUEST_URI'];
if(isset($_POST['cadastrarCategoria']) && !empty($_POST['nomeCategoria'])){
	$nomeCategoria = $_POST['nomeCategoria'];
	$stmt= $conexao->prepare("SELECT * FROM categoria WHERE nome = ?");
	$stmt->execute(array($nomeCategoria));
	$value = $stmt->rowCount();
	if($value >= 1){
		setcookie("systemMessage", "{\"title\": \"Message\", \"subTitle\": \"System\", \"body\": \"Categoria Ja Existe\"}", time() + 15, "$path");
	}else{
		$nomeCategoria = $_POST['nomeCategoria'];
		$stmt = $conexao->prepare("INSERT INTO `categoria` VALUES(null, :nomeCategoria)");
		$stmt->bindValue(":nomeCategoria", $nomeCategoria);
		$stmt->execute();
		setcookie("systemMessage", "{\"title\": \"Message\", \"subTitle\": \"System\", \"body\": \"Inserido com sucesso\"}", time() + 15, "$path");
	}
}else if(isset($_POST['cadastrarCategoria']) && empty($_POST['nomeCategoria'])){
	setcookie("systemMessage", "{\"title\": \"Message\", \"subTitle\": \"System\", \"body\": \"Vazio não pode\"}", time() + 15, "$path");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Loja carro Sistema </title>
	<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">

</head>
<body class="d-flex flex-column min-vh-100">

	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container-fluid">
			<a class="navbar-brand" href="./">LOGO</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="./">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="sistema.php">Sistema</a>
					</li>
				</ul>
				<ul class="navbar-nav mr-auto mb-2 mb-lg-0">
					<li class="nav-item">
						<a class="nav-link" aria-current="page" href="./">Login</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>

	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-6">
				<form method="post">
					<div class="mb-3">
						<label for="inputCategory" class="form-label">::Categoria</label>
						<input type="text" name="nomeCategoria" class="form-control" id="inputCategory" aria-describedby="categoryNameHelp">
					</div>
					<button type="submit" name="cadastrarCategoria" class="btn btn-primary">Cadastrar Categoria</button>
				</form>
			</div>
		</div>
	</div>





	<footer class="mt-auto bg-dark footer mt-5">
		<div class="container mt-3">
			<div class="row">
				<div class="col-12">
					<ul class="list-unstyled">
						<li class="text-white"><a class="text-decoration-none link-light" href="./" target="_blank">Repositório do projeto</a></li>
					</ul>
				</div>
			</div>
			<hr class="bg-white">
			<div class="row mb-1">
				<div class="col-12 d-flex justify-content-center">
					<span class="text-white">© 2021 - <?php echo date("Y")?> SITE, Inc</span>
				</div>
			</div>
		</div>
	</footer>
	<script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="../assets/js/main.js"></script>
	<script>
		window.onload = () => {
		    initToast();
		}
	</script>
</body>						
</html>