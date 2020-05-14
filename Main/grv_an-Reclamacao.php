<?php
   session_start();
   require("include/lib.php");
   if(!$_SESSION['codigo'])header("location:index.php");
   head();
   $db=new banco();
   if($_GET[exc]){
      //$db->grava("delete from setores where codigo='$_GET[exc]'","Registro excluÃ­do com sucesso!","Erro ao excluir o registro","principal.php?pag=cadset");
   }elseif($_POST['codigo']>0){   
      //$db->grava("update setores set descricao='$_POST[descricao]' where codigo=$_POST[codigo]","Registro alterado com sucesso!","Erro ao alterar o registro","principal.php?pag=cadset");             
   }else{
      $db->grava("insert into reclamacao(aluno, setor, professor, texto, statusoperacao) values (0, $_POST[setor], $_POST[professor], '$_POST[TextoReclamacao]', 1)","Registro incluÃ­do com sucesso!","Erro ao inserir o registro","index.php");
   }   
   foot();
?>