<?php
   session_start();
   require("include/lib.php");
   if(!$_SESSION['codigo'])header("location:index.php");
   head();
   $db=new banco();
   if($_GET[exc]){
      $db->grava("delete from setores where codigo='$_GET[exc]'","Registro excluÃ­do com sucesso!","Erro ao excluir o registro","principal.php?pag=cadset");
   }elseif($_POST['codigo']>0){  
      echo "cehgou aqui" ;
      $db->grava("update reclamacao set resposta='$_POST[resposta]', statusoperacao=3 where id_operacao=$_POST[codigo]","Registro alterado com sucesso!","Erro ao alterar o registro","principal.php?pag=consultaSetor");             
   }else{
      $db->grava("update reclamacao set resposta='$_POST[resposta]', statusoperacao=3 where id_operacao=$_POST[id_operacao]","Registro alterado com sucesso!","Erro ao alterar o registro", "principal.php?pag=consultaSetor");
   }   
   foot();
?>