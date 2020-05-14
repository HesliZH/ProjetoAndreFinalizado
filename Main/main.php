<?php 
    require('include/lib.php');

    if(!@($conexao = pg_connect("host=127.0.0.1 dbname=ouvidoria port=5432 user=postgres password=postgres"))) 
    {
        echo("<script>alert('Não foi possível estabelecer uma conexão com o banco de dados.')");
    } 
    else 
    {
        $query = "select codigo, descricao from setores order by 2";
        $query2 = "select codigo, nome_completo from FUNCIONARIOS WHERE SETOR = 8 order by 2";
        

        $result = pg_query($conexao, $query);
        $result2 = pg_query($conexao, $query2);
}

?>

<html>
    <header>
        <title>Página de ouvidoria Uniguaçu</title>
    </header>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> 
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
    <!-- Script para exibição do campo dentro da tela-->
    <script>
        function MostrarProfessores() {
        //Abre a função que mostra o campo de professores 
            var prof = document.getElementById("setor").value;
            if (prof == '8') {
                /*
                    Aqui adiocionar o campo de professores.

                */
                document.getElementById("BlocoProfessores").style.display = "block";
                //document.getElementById("labelProfessor").style.display = "block";
            } else {
                document.getElementById("BlocoProfessores").style.display = "none";
                //document.getElementById("labelProfessor").style.display = "none";
            }
        }                       
    </script>
    <body>
        <form method="POST" action="grvReclamacao.php">
            <br>
            <div class="alert alert-success" role="alert" style="margin-left: 20%; margin-right:20%">
                <p>Digite no campo abaixo uma sugestão / reclamação.</p>
            </div>
            <div class="form-group" style="margin-left: 20%; margin-right:20%">
                <textarea class="form-control" id="TextoReclamacao" rows="3" name="TextoReclamacao"></textarea>
            </div>
            <div class="form-group" style="margin-left: 20%; margin-right:20%">
                <label for="setor">Escolha o setor desejado</label>
                    <select class="form-control" id="setor" name="setor" onChange="javascript:MostrarProfessores()">
                        <?php
                            while($consulta = pg_fetch_assoc($result)){
                                echo("<option value='".$consulta['codigo']."'>".$consulta['descricao']."</option>");
                            }
                        ?>
                    </select>
            </div>
            <div class="form-group" style="margin-left: 20%; margin-right:20%; display: none;" id="BlocoProfessores">
                <label for="professor" id="labelProfessor">Escolha o professor a ser direcionado</label>
                    <select class="form-control" id="professor" name="professor">
                        <option value="0">GERAL</option>
                        <?php                   
                            while($consulta2 = pg_fetch_assoc($result2)){
                                echo("<option value='".$consulta2['codigo']."'>".$consulta2['nome_completo']."</option>");
                            }
                        ?>
                    </select>
            </div>
            <input type="submit" value="Enviar mensagem" class="btn btn-success" style="margin-left:45%; margin-right:50%">
        </form>
    </body>                           
</html>