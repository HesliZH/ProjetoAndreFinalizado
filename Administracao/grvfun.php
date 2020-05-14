<?php
   session_start();
   require("include/lib.php");
   if(!$_SESSION['codigo'])header("location:index.php");
   head();
   $db=new banco();
   if($_GET[exc]){
      $db->grava("delete from FUNCIONARIOS where codigo='$_GET[exc]'","Registro excluÃ­do com sucesso!","Erro ao excluir o registro","principal.php?pag=cadfun");
   }elseif($_POST['codigo']>0){   
      $db->grava("update funcionarios set nome_completo='$_POST[nome]', cpf='$_POST[cpf]', senha=md5('$_POST[senha]'), setor='$_POST[setor]' where codigo=$_POST[codigo]","Registro alterado com sucesso!","Erro ao alterar o registro","principal.php?pag=cadfun");             
   }else{
      $db->grava("insert into funcionarios(nome_completo, cpf, senha, setor) values ('$_POST[nome]', '$_POST[cpf]', md5('$_POST[senha]'), '$_POST[setor]')","Registro incluÃ­do com sucesso!","Erro ao inserir o registro","principal.php?pag=cadfun");
   }   
   foot();
?>