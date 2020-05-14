<?php
   session_start();
   require("include/lib.php");
   if(!$_SESSION['codigo'])header("location:index.php");
   head();
   $db=new banco();
   $db->consulta("SELECT CODIGO, DESCRICAO FROM SETORES");
   $frm=new form('Cadastro de funcionario','grvfun.php','POST');
   $frm->hidden('codigo');
   $frm->text('nome','Nome Completo',50,30,'*');
   $frm->text('cpf','CPF (Utilize "." e "-")',50,30,'*');
   $frm->password('senha','Senha para acesso',50,30,'*');
   $frm->dbselect('setor', 'Setor', $db->res, '*');
   if($_GET['alt']){
      $db->consulta("select * from funcionarios where codigo=$_GET[alt]");
      $frm->carrega($db->res);
   }   
   $frm->show('setor');
   foot();
?>