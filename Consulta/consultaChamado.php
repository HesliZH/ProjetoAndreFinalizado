<?php
   
   $db=new banco();
   $db->consulta("SELECT r.id_operacao, R.TEXTO, R.RESPOSTA, ST.DESCRICAO FROM RECLAMACAO R INNER JOIN ALUNO A ON (A.CODIGO = R.ALUNO) INNER JOIN SETORES S ON (S.CODIGO = R.SETOR) INNER JOIN STATUS ST ON (ST.CODIGO = R.STATUSOPERACAO) WHERE ST.ORDENACAO = '3' and aluno in (0, $_SESSION[codigo]) ORDER BY 1");
   $db->cheader=array('Codigo do chamado','Texto do chamado','Resposta','Status atual','Opções');
   $db->lista2('reclamacao','frmresp.php','frmresp.php','grvresp.php');
?>