<?php
   $db=new banco();
   $db->consulta("select f.codigo, f.nome_completo, s.descricao from funcionarios f inner join setores s on s.codigo = f.setor order by nome_completo");
   $db->cheader=array('Código','Nome do funcionario','Setor','Opções');
   $db->lista2('funcionario','frmfun.php','frmfun.php','grvfun.php');
?>