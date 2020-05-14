<?php
   session_start();
   require("include/lib.php");
   if(!$_SESSION['codigo'])header("location:index.php");
   head();
   $db=new banco();
   $frm=new form('Responda aos chamados','grvresp.php','POST');
   $frm->hidden('id_operacao');
   $frm->text('resposta','Digite sua resposta ao chamado',50,30,'*');
   if($_GET['alt']){
      $db->consulta("select id_operacao, resposta from reclamacao where id_operacao=$_GET[alt]");
      $frm->carrega($db->res);
   }   
   $frm->show('chamados');
   foot();
?>