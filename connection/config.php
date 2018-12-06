<?php
// TIPO DE CONEXÃO COM BANCO 
switch($ambiente):
  case 'homolog':
    $host = "127.0.0.1"; // Local da base de dados MySQL
    $user = "root"; // Login do MySQL
    $pass = "123456"; // Senha para conectar com o MySQL
    $base = "legislacao_homolog"; // Nome do Banco de Dados
  break;
  case 'dev':
    default:
      $host = "127.0.0.1"; // Local da base de dados MySQL
      $user = "root"; // Login do MySQL
      $pass = "root"; // Senha para conectar com o MySQL
      $base = "legislacao"; // Nome do Banco de Dados
  break;
  
endswitch;

?>