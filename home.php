<?php
require_once("./helpers/connection.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title> HOME PAGE</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet"  href="css/home.css">
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">


</head>
<body>

	<header id="cabecaMenu" >
		<nav id="barraNavegação" class="navbar navbar-expand-sm bg-dark  justify-content-center">
			<ul class="navbar-nav">
				<li class="nav-item"><a href="#" class="nav-link">Home</a></li>
				<li class="nav-item"><a href="#" class="nav-link">Sobre</a></li>
				<li class="nav-item"><a href="#" class="nav-link">Contato</a></li>
			</ul>
		</nav>
	</header>

	<!--form method="POST"> 
		
		#barra de pesquisa desativada tmeporariamente

			<input type="text" name="categoria">
			<input type="submit" name="buscar">
			<!?php
				if(isset($_POST['buscar'])){
				$categoria = $_POST['categoria'];	
				$sql = $conexao->prepare("SELECT * FROM `carros` WHERE modelo = ?");
				$sql->setFetchMode(PDO::FETCH_OBJ);
				$sql->execute(array($categoria));
				if($row = $sql->fetch()){
						echo $row->modelo.'<br>';
						echo $row->ano;
			}else{
				echo 'Modelo Não existe';
			}
		}	
			?>
	</form-->


<?php
$sql = $conexao->prepare("SELECT * FROM carros");
$sql->execute();
$lista = $sql->fetchAll();
foreach ($lista	 as $carros):
?>

<section id="cardVeiculo">
	<div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
		<div class="carousel-inner">
			<div class="carousel-item active">
				<img src="img/bmw320.webp" class="d-block w-100" alt="...">
				<p><?php echo $carros['id_carro'];?></p>
				<h6>Modelo:  <?php echo $carros['modelo'];?></h6>
				<h6>Ano:  <?php echo $carros['ano'];?></h6>
				<h6>Preço:  <?php echo $carros['preco'];?></h6>
			</div>
			<div class="carousel-item">
				<img src="img/bmw-320i2.webp" class="d-block w-100" alt="...">
				<p><?php echo $carros['id_carro'];?></p>
				<h6>Modelo:  <?php echo $carros['modelo'];?></h6>
				<h6>Ano:  <?php echo $carros['ano'];?></h6>
				<h6>Preço:  <?php echo $carros['preco'];?></h6>
			</div>
			<div class="carousel-item">
				<img src="img/bmw320.webp" class="d-block w-100" alt="...">
				<p><?php echo $carros['id_carro'];?></p>
				<h6>Modelo:  <?php echo $carros['modelo'];?></h6>
				<h6>Ano:  <?php echo $carros['ano'];?></h6>
				<h6>Preço:  <?php echo $carros['preco'];?></h6>
			</div>
		</div>
	</div>
	<a href="especifico.php?id=<?php echo $carros['id'];?>">Saiba mais</a>
</section>

</div>
<?php endforeach; ?>


	
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>