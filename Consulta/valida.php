<?php
   session_start();   
   include "include/lib.php";
   $_POST = str_replace("'",'',$_POST);
   //print_r($_POST);exit;
   $db=new banco;
   $db->consulta("select * from aluno where ra='$_POST[ra]'");
   if($lin=@pg_fetch_object($db->res)){
      $_SESSION['codigo']=$lin->codigo;
      $_SESSION['nome']=$lin->nome_completo;
      header("location:principal.php?pag=consultaChamado");
   }else{
      echo("<script>alert('Senha invÃ¡lida');document.location='index.php';</script>");
   }

?>