<?php
   session_start();   
   include "include/lib.php";
   $_POST = str_replace("'",'',$_POST);
   //print_r($_POST);exit;
   $db=new banco;
   $db->consulta("select * from usuarios where email='$_POST[usuario]' and senha=md5('$_POST[senha]')");
   if($lin=@pg_fetch_object($db->res)){
      $_SESSION['codigo']=$lin->codigo;
      $_SESSION['nome']=$lin->nome_completo;
      header("location:principal.php");
   }else{
      echo("<script>alert('Senha invÃ¡lida');document.location='index.php';</script>");
   }

?>