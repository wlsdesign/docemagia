<?php
include('../../../inc/conexao.php');

$exclui = $_GET['excluir'];


$sql = mysql_query("DELETE FROM users WHERE id ='$exclui'") or die(mysql_error());
 ?>