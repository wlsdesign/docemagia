<?php
include('../../../inc/conexao.php');

$nome = $_POST['nome'];
$login = $_POST['login'];
$senha = md5($_POST['senha']);
$foto = $_FILES['foto']['name'];




if(empty($foto)){
	$sql = mysql_query("INSERT INTO users (nome, login, senha, foto) VALUES ('$nome', '$login', '$senha', 'user.png')");
}
else{
	if(!eregi("^image\/(jpeg|jpg|png|gif)$", $_FILES['foto']['type'])){
		return die;
	}
	
	if(file_exists("../imagens/usuario/$foto")){
		$i = 1;
		while(file_exists("../imagens/usuario/[$i]$foto")){
			$i++;
		}
			
		$foto ="[".$i."]".$foto;
	}
		
		move_uploaded_file($_FILES['foto']['tmp_name'], "../imagens/usuario/".$foto);

	$sql = mysql_query("INSERT INTO users (nome, login, senha, foto) VALUES ('$nome', '$login', '$senha', '$foto')");
	return $msg = "Usuário cadastrado com sucesso.";

}

 ?>