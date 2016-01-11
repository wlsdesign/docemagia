<?php
include('../../../inc/conexao.php');


$nome = $_POST['nome'];
$login = $_POST['login'];
$senha = md5($_POST['senha']);
$foto = $_FILES['file']['name'];
$alterar = $_GET['alterar'];

// $sql = mysql_query("SELECT * FROM users WHERE id = '$alterar' ");
// $altera = mysql_query("UPDATE users SET nome = '$nome', login = '$login' WHERE id = '$alterar'");


if(!empty($foto)){
	$sql = mysql_query("SELECT * FROM users WHERE id = '$alterar' ");
	while($ln=mysql_fetch_array($sql)){
	$foto_db = $ln['foto'];
	}

	if($foto_db != 'user.png'){
		unlink("../imagens/usuario/".$foto_db);
	}	
	
	move_uploaded_file($_FILES['file']['tmp_name'], "../imagens/usuario/".$foto);
	
	$altera = mysql_query("UPDATE users SET nome = '$nome', login = '$login', senha = '$senha', foto = '$foto' WHERE id = '$alterar'") or die(mysql_error());
}else{
	$altera = mysql_query("UPDATE users SET nome = '$nome', login = '$login', senha = '$senha' WHERE id = '$alterar'") or die(mysql_error());
}

 ?>