<?php
  /*$dataInicio = date('2018-01-01');
  echo $dataInicio;
  exit;
  */

  var_dump($argc);
  var_dump($argv[1]);
  var_dump($argv[2]);

  function validateDate($dataAtual, $format = 'd-m-Y')
  {
      $d = DateTime::createFromFormat($format, $dataAtual);
      return $d && $d->format($format) == $dataAtual;
  }
 
  if($argc <2 ){
    echo "\nA data deve ser passada para o script\n";
  } elseif ($argv[1] == NULL) {
    echo "\nO primeiro índice não pode ser nulo e deve ser uma data.\n";
  } elseif ($argv[1] != validateDate($argv[1])){
    echo "\nO valor deve ser uma data\n";
  }

  $possibilidades = array('dev', 'hom', 'default');
  
  if(!in_array($argv[2], $possibilidades))
  {
    echo 'NULL';
  }
 
  $ambiente = 'dev';
  require_once('config.php');

  //FAZENDO A CONEXÃO COM O BANCO DE DADOS
  $con = new mysqli($host, $user, $pass, $base);

  // CHECAR CONEXÃO
  if(mysqli_connect_errno()){
  die('Error: Falha ao conectar ao banco de dados MySQL: ' + mysqli_connect_errno());
  } else {
  echo("\nConexão com banco efetuada com sucesso.\n\n");
  }
?>