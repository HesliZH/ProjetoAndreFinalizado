<?php
    session_start();
    include 'include/lib.php';
    
    head();
        $frm = new Form("Página de ouvidora uniguaçu", "valida.php", "POST");
            $db = new banco();
            $db->consulta("select codigo, nome from usuario");
            $frm->text('cpf', 'Informe CPF para acesso', 50,30,'*');
            $frm->password('senha', 'Senha');
            $frm->show();
    foot();
?>