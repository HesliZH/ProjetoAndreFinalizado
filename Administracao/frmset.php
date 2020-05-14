<?php
   session_start();
   require("include/lib.php");
   if(!$_SESSION['codigo'])header("location:index.php");
   head();
   $db=new banco();
   $frm=new form('Cadastro de setores','grvset.php','POST');
   $frm->hidden('codigo');
   $frm->text('descricao','Nome do Setor',50,30,'*');
   if($_GET['alt']){
      $db->consulta("select * from setores where codigo=$_GET[alt]");
      $frm->carrega($db->res);
   }   
   $frm->show('setor');
   foot();
?>