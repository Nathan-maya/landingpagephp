<?php
  //Configuração do banco de dados

  define('SERVIDOR','localhost');
  define('USUARIO','root');
  define('SENHA','');
  define('BANCO','cliente');
  
  //Retirar espaço, caracteres especiais etc
  function limpaPost($dados){
    $dados = trim($dados);
    $dados = stripslashes($dados);
    $dados = htmlspecialchars($dados);
    return $dados;
  }

?>