<html>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> 
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <head>
        <title>Página de ouvidoria Uniguaçu</title>

        <script>
            /*var tipologin = document.getElementByName("tipologin");
            var formLogin = document.getElementByName("login");

            if(tipologin == "1"){
                formLogin.style.display = none;
            }else{
                formLogin.style.display = block;
            }*/

            function EscondeForm(){
                var $radio1 = document.getElementById("tipologin");
                var $div1 = document.getElementById("formulario");
               /* var $radio2 = document.getElementById("div2");
                var $div2 = document.getElementById("m2");*/
                if($radio1.checked){
                    $div1.setAttribute("hidden", "hidden");
                }else{
                    $div1.removeAttribute("hidden");
                }
            }

            function exibeOutros(){
                if (document.getElementById("tipologin").value == "1")
                    document.getElementById("formulario").visibility = hidden;
                else
                    document.getElementById("formulario").visible = visible;
            }


            function Esconde(){
                $(document).ready(function(){
                    $("#anonimo").click(function(evento){
                        if ($("#anonimo").attr("checked")){
                            $("#formulario").css("display", "none");
                        }else{
                            $("#formulario").css("display", "block");
                        }
                    });
                });
            }   

            
            $("#anonimo").click(function(){
            
                if($(this).val()=="1"){
                    $("#email").css("visibility","hidden");
                    $(this).val("false");
                }
                else{
                    $("#login").css("visibility","visible");
                    $(this).val("true");
                }
                    
                
            }); 

            $(document).ready(function() {
            // QUANDO CHECKBOX É CHECADO
                $('#anonimo').click(function() {
                // ESCONDE TODAS AS DIVS
                    $('.formulario').hide();
                });    
            });
        </script>
    </head>

    <body>
        <div class="alert alert-primary" role="alert" style="margin-left: 20%; margin-right:20%">
               <p align="Center"> Página de ouvidoria Uniguaçu</p>
        </div>
        <div class="alert alert-success" role="alert" style="margin-left: 20%; margin-right:20%">
            <h4 class="alert-heading">Seja bem vindo!</h4>
            <p>Sinta-se a vontade para fazer login como desejar, caso não queira se identificar selecione a opção anônimo.</p>
            <hr>
            <p class="mb-0">A coordenação da Uniguaçu agradece seu acesso, faremos o possível para atender suas solicitações.</p>
        </div>

        <br>
        <br>

        <div name="tipologin" id="tipologin" style="margin-left: 20%; margin-right:20%">
            <form name="login" action="an-reclamacao.php">
                <button type="submit" class="btn btn-primary">Login anônimo?</button>
            </form>
        </div>

        <br>
        <br>

        <div style="margin-left: 20%; margin-right:20%" name="formulario" id="formulario" class="formulario">
            <form name="login" action="valida.php" method="POST">
                <div class="form-group">
                    <label for="email">RA para acesso</label>
                    <input type="text" class="form-control" id="ra" aria-describedby="emailHelp" placeholder="Preencha o ra" name="ra">
                </div>
                <div class="form-group">
                    <label for="senha">Senha para acesso</label>
                    <input type="password" class="form-control" id="senha" placeholder="Senha" name="senha">
                </div>
                <button type="submit" class="btn btn-primary">Entrar</button>
            </form>
        </div>
    </body>
</html>