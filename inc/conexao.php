<?php
//conexão com o servidor

$conect = mysql_connect("localhost", "root", "");

// $conect = mysql_connect("localhost", "agendari_admin", "agendario2014");


// Caso a conexão seja reprovada, exibe na tela uma mensagem de erro


if (!$conect) die ("<h1>Falha na conexão com o Banco de Dados!</h1>");

// Caso a conexão seja aprovada, então conecta o Banco de Dados.	



$db = mysql_select_db("docemagia");

mysql_query("SET NAMES 'utf8'");

mysql_query('SET character_set_connection=utf8');

mysql_query('SET character_set_client=utf8');

mysql_query('SET character_set_results=utf8');

/*Configurando este arquivo, depois é só você dar um include em suas paginas php, isto facilita muito, pois caso haja necessidade de mudar seu Banco de Dados



você altera somente um arquivo*/



?>