<?php
   $db=new banco();
   $db->consulta("select * from status order by descricao ");
   $db->cheader=array('Código','Descricao do status','Ordenação','Opções');
   $db->lista2('status','frmsta.php','frmsta.php','grvsta.php');
?>