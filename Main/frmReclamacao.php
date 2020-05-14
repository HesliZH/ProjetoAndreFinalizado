<?php
   session_start();
   require("include/lib.php");
   if(!$_SESSION['codigo'])header("location:index.php");
   head();
   $db=new banco();
   $frm=new form('Digite abaixo o texto com a reclamação / sugestão','grvReclamacao.php','POST');
   $frm->hidden('codigo');
   $frm->text('teste','campo teste 1',50,30,'*');
   echo('<textarea name="reclamacao" align="center"></textarea>');
   if($_GET['alt']){
      $db->consulta("select * from setores where codigo=$_GET[alt]");
      $frm->carrega($db->res);
   }   
   $frm->show('setor');
   foot();
?>