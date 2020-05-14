<?php
   session_start();
   require("include/lib.php");
   if(!$_SESSION['codigo'])header("location:index.php");
   head();
   $db=new banco();
   if($_GET[exc]){
      $db->grava("delete from status where codigo='$_GET[exc]'","Registro excluÃ­do com sucesso!","Erro ao excluir o registro","principal.php?pag=cadgsta");
   }elseif($_POST['codigo']>0){   
      $db->grava("update status set descricao='$_POST[descricao]', ordenacao='$_POST[ordenacao]' where codigo=$_POST[codigo]","Registro alterado com sucesso!","Erro ao alterar o registro","principal.php?pag=cadsta");             
   }else{
      $db->grava("insert into status(descricao, ordenacao) values ('$_POST[descricao]', '$_POST[ordenacao]')","Registro incluÃ­do com sucesso!","Erro ao inserir o registro","principal.php?pag=cadsta");
   }   
   foot();
?>