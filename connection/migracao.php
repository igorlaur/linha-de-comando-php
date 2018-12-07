<?php
  /*$dataInicio = date('2018-01-01');
  echo $dataInicio;
  exit;
  */

  $dataAtual = date('Y-m-d');

  function validateDate($dataEscolhida, $format = 'Y-m-d')
  {
    // Ten 
    $d = DateTime::createFromFormat($format, $dataEscolhida);
    return $d && $d->format($format) == $dataEscolhida;
  }
 
  if($argc <2 ){
    echo "\nA data deve ser passada para o script\n";
    exit;
  } elseif ($argv[1] == NULL) {
    echo "\nO primeiro índice não pode ser nulo e deve ser uma data.\n";
    exit;
  } elseif ($argv[1] != validateDate($argv[1])){
    echo "\nO primeiro índice deve ser uma data.\n";
    exit; // Para não der outro erro a não ser o meu
  }

  //Start date
  $dateStart 		= $argv[1];
  $dateStart 		= new DateTime($dateStart);

  //End date
  $dateEnd 		= $dataAtual;
  $dateEnd 		= new DateTime($dateEnd);

  //Imprima os dias de acordo com intervalo
  $dataEscolhida = array();
  while($dateStart <= $dateEnd){
    $dataEscolhida[] = $dateStart->format('d-m-Y');
    $dateStart = $dateStart->modify('+1day');
  }

  var_dump($dataEscolhida);
 
  $possibilidades = array('dev', 'hom', 'default');
  
  if(!isset($argv[2]) || !in_array($argv[2], $possibilidades))
  {
    echo 'O ambiente passado não pode ser vazio ou está inválido';
    exit;
  }

  // Start config
  $ambiente = $argv[2];
  require_once('config.php');
  // End config
  
  //FAZENDO A CONEXÃO COM O BANCO DE DADOS
  $con = new mysqli($host, $user, $pass, $base);

  // CHECAR CONEXÃO
  if(mysqli_connect_errno()){
  die('Error: Falha ao conectar ao banco de dados MySQL: ' + mysqli_connect_errno());
  } else {
    echo("\nConexão com banco efetuada com sucesso.\n\n");
  }
  
  $dataInicio = $argv[1] . ' 00:00:00'; 

  $query = "SELECT * FROM wp_vademecum_cupons WHERE data_criacao BETWEEN 
  '".$dataInicio."' AND ''";

  //echo $query;die ("\n\n");
  // now sql para passar a data atual do pc // now já vem horário fixo
  // colocar o now dentro da query do sql

  $result = mysqli_query($con, $query) or die(mysqli_error());

  // PERCORRA AS LINHAS DA TABELAS
  while($row=mysqli_fetch_array($result)){
    print_r($row);
  }

?>