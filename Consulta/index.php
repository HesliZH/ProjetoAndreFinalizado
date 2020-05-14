<?php
    session_start();
    include 'include/lib.php';
    
    head();
        $frm = new Form("Página de ouvidora uniguaçu", "valida.php", "POST");
            $db = new banco();
            $db->consulta("select codigo, nome_completo from aluno");
            $frm->text('ra', 'Informe RA para consulta', 50,30,'*');
            $frm->show();
    foot();
?>