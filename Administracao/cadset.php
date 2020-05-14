<?php
   $db=new banco();
   $db->consulta("select * from setores order by descricao ");
   $db->cheader=array('Código','Descricao do setor','Opções');
   $db->lista2('setor','frmset.php','frmset.php','grvset.php');
?>