<?php
  //Configuração do banco de dados

  $modo='local';

  if($modo =='local'){
    define('SERVIDOR','localhost');
    define('USUARIO','root');
    define('SENHA','');
    define('BANCO','cliente');  
  }

  if($modo == 'producao'){
    define('SERVIDOR','us-cdbr-east-06.cleardb.net');
    define('USUARIO','bdb07e006ad878');
    define('SENHA','0550b188');
    define('BANCO','heroku_bf681ee132a9fbb');
  }

  
  //Retirar espaço, caracteres especiais etc
  function limpaPost($dados){
    $dados = trim($dados);
    $dados = stripslashes($dados);
    $dados = htmlspecialchars($dados);
    return $dados;
  }

?>