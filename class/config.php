<?php
  //Configuração do banco de dados

  $modo='producao';

  if($modo =='local'){
    define('SERVIDOR','localhost');
    define('USUARIO','root');
    define('SENHA','');
    define('BANCO','cliente');  
  }

  // if($modo == 'producao'){
  //   define('SERVIDOR','us-cdbr-east-06.cleardb.net');
  //   define('USUARIO','bdb07e006ad878');
  //   define('SENHA','0550b188');
  //   define('BANCO','heroku_bf681ee132a9fbb');
  // }

  
  if($modo == 'producao'){
    define('SERVIDOR','cxmgkzhk95kfgbq4.cbetxkdyhwsb.us-east-1.rds.amazonaws.com');
    define('USUARIO','ot1q1lq6t7drvnot');
    define('SENHA','x122sooh9983z6dy');
    define('BANCO','iz0kffffflhvreu9');
  }

  
  //Retirar espaço, caracteres especiais etc
  function limpaPost($dados){
    $dados = trim($dados);
    $dados = stripslashes($dados);
    $dados = htmlspecialchars($dados);
    return $dados;
  }

?>