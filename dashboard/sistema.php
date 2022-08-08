<?php
require_once("../helpers/connection.php");
$sql= $conexao->prepare("SELECT * FROM categoria ");
$sql->execute();
$stmt = $sql->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<title> Sistema	</title>
</head>
<body>

	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container-fluid">
			<a class="navbar-brand" href="./">LOGO</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
					<li class="nav-item">
						<a class="nav-link" aria-current="page" href="./">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link active" href="sistema.php">Sistema</a>
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

	<form method="post" id="sistemaCadastroVeiculo">
		::Marca	
		<br>
		<select name="marca">
			<?php foreach ($stmt as $lista) : ?>
				<option value="<?php echo $lista['id'];?>"> <?php echo $lista['nome'];?> </option>
			<?php endforeach; ?>
		</select>
		<br>
		::Modelo
		<br>
		<input type="text" name="nomeModelo">
		<br>
		::Ano
		<br>
		<input type="text" name="anoVeiculo">
		<br>
		::Preço
		<br>
		<input type="text" name="precoVeiculo">
		<br>
		<input type="submit" name="cadastrarVeiculo" value="cadastrar veiculo">

		<?php
		/*
		if($_POST['nomeModelo'] == "" || $_POST['nomeModelo'] == null && $_POST['anoVeiculo'] == "" || $_POST['anoVeiculo'] == null && $_POST['precoVeiculo'] == "" || $_POST['precoVeiculo'] == null && $_POST['marca']  == null){
        		echo'<br>';
				echo '<div style="background-color:red; padding:10px;"> Vazio Não pode</div>';
        	exit;
        }

		*/

        if(isset($_POST['cadastrarVeiculo'])){
        	$nomeModelo = $_POST['nomeModelo'];
        	$anoVeiculo = $_POST['anoVeiculo'];
        	$precoVeiculo = $_POST['precoVeiculo'];
        	$marca = $_POST['marca'];
			#query do insert
        	$sql = $conexao->prepare("INSERT INTO `carros` (`modelo`, `ano`, `preco`, `id_carro`, `id`) VALUES (':nomeModelo',':anoVeiculo' ,':precoVeiculo' ,':marca' , NULL)");
			#bindValue verifica SQL INJECTION
        	$sql->bindValue(":nomeModelo", $nomeModelo);
        	$sql->bindValue(":anoVeiculo", $anoVeiculo);
        	$sql->bindValue(":precoVeiculo", $precoVeiculo);
        	$sql->bindValue(":marca", $marca);
        	$sql->execute();
        	echo'<br>';
        	echo '<div style="background-color:green; padding:10px;"> Cadastrado com Sucesso</div>';



        }		




        ?>

    </form>
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
</html>