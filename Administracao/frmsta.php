<?php
   session_start();
   require("include/lib.php");
   if(!$_SESSION['codigo'])header("location:index.php");
   head();
   $db=new banco();
   $frm=new form('Cadastro de status','grvsta.php','POST');
   $frm->hidden('codigo');
   $frm->text('descricao','Nome do Status',50,30,'*');
   $frm->text('ordenacao','Ordenação de chamado',50,30,'1');
   if($_GET['alt']){
      $db->consulta("select * from status where codigo=$_GET[alt]");
      $frm->carrega($db->res);
   }   
   $frm->show('status');
   foot();
?>