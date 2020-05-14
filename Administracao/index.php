<?php
    session_start();
    include 'include/lib.php';
    
    head();
        $frm = new Form("Portal Administrativo ouvidoria Uniguaçu", "valida.php", "POST");
            $db = new banco();
            //$db->consulta("select id_usuario, nome from usuario");
            $frm->text('usuario', 'Usuario', 50,30, '*');
            $frm->password('senha', 'Senha');
            $frm->show();
    foot();
?>
