<?php
require_once("./helpers/connection.php");
$stmt = null;
if(isset($_GET['id'])){
	#pega o id da lista de veículos pelo metodo post
	$id=$_GET['id'];
	#pega o id no banco de dados
	$sql= $conexao->prepare("SELECT * FROM carros WHERE id = ?");
	$sql->execute(array($id));
	$stmt = $sql->fetch();
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Especifico </title>
</head>
<body>
	<?php if($stmt !== null): ?>
		<h3>Modelo: <?php echo htmlspecialchars($stmt['modelo'], ENT_COMPAT,'ISO-8859-1', true); ?></h3>
		<h3>Ano: <?php echo htmlspecialchars($stmt['ano'], ENT_COMPAT,'ISO-8859-1', true); ?></h3>
		<h3>Preço:<?php echo 'R$'.htmlspecialchars($stmt['preco'], ENT_COMPAT,'ISO-8859-1', true); ?></h3>
	<?php endif; ?>
	<form method="POST" action="./email/email.php">
		::E-mail
		<br>
		<input type="email" name="emailProposta">
		<br>
		::Informe a proposta
		<br>
		<textarea name="valorProposta"></textarea>
		<br>
		<?php if(isset($_GET['id'])): ?>
		<input type="hidden" name="car_id" value="<?php echo $_GET['id']; ?>">
		<?php endif; ?>
		<button type="submit" name="enviar">Enviar Proposta</button>
	</form>


</body>
</html>