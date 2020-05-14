<?php
   session_start();   
   include "include/lib.php";
   $_POST = str_replace("'",'',$_POST);
   //print_r($_POST);exit;
   $db=new banco;
   $db->consulta("select * from aluno where ra='$_POST[ra]' and senha=md5('$_POST[senha]')");
   if($lin=@pg_fetch_object($db->res)){
      $_SESSION['codigo']=$lin->codigo;
      $_SESSION['nome']=$lin->nome;
      header("location:main.php");
   }else{
      echo("<script>alert('Senha invÃ¡lida');document.location='index.php';</script>");
   }

?>