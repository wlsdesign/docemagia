<?php

//funcao para criptografar
function Codifica( $string )
{
	
  $cipher     = "rijndael-128";
  $mode       = "cbc";
  $plain_text = $string;
  $secret_key = "A#E%]Ru1,sDq";
  $iv         = "fedcba9876543210";

  $td = mcrypt_module_open($cipher, "", $mode, $iv);
  mcrypt_generic_init($td, $secret_key, $iv);
  $cyper_text = mcrypt_generic($td, $plain_text);
  
  //transforma o binario em hexadecimal
  return bin2hex($cyper_text);	
}

//funcao que transforma hexadecimal para binario
// function hex2bin( $hexdata )
// {
//   $bindata="";

//   for ($i=0;$i<strlen($hexdata);$i+=2) {
//    $bindata.=chr(hexdec(substr($hexdata,$i,2)));
//   }

//   return $bindata;
// }

//funcao para decriptografar
function Decodifica ( $string )
{
	$cipher     = "rijndael-128";
	$mode       = "cbc";
	$secret_key = "A#E%]Ru1,sDq";
	$iv         = "fedcba9876543210";

	$td = mcrypt_module_open($cipher, "", $mode, $iv);

	mcrypt_generic_init($td, $secret_key, $iv);

	return $valor_decodificado = trim(mdecrypt_generic($td, hex2bin($string)));
}
?>
