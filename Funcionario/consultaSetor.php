<?php

   $db=new banco();
   $db->consulta("SELECT r.id_operacao, A.NOME_COMPLETO, R.TEXTO, ST.DESCRICAO FROM RECLAMACAO R INNER JOIN ALUNO A ON (A.CODIGO = R.ALUNO) INNER JOIN SETORES S ON (S.CODIGO = R.SETOR) INNER JOIN STATUS ST ON (ST.CODIGO = R.STATUSOPERACAO) WHERE ST.ORDENACAO = '1' and s.codigo = $_SESSION[setor] ORDER BY 1");
   $db->cheader=array('Codigo do chamado','Nome do aluno','Descrição do problema','Status atual','Opções');
   $db->lista2('reclamacao','frmresp.php','frmresp.php','grvresp.php');
?>