<nav id="menu-wrap">
   <ul id="menu">
      <li><a href='principal.php' target='corpo'>Home</a></li>
      <li>
         <a href=''>Parâmetros</a>
         <ul>
            <li><a href='?pag=cadusu'>Usuários</a></li>
            <li><a href='?pag=config'>Configurações</a></li>
         </ul>
      </li>   
      <li>
         <a href=''>Cadastros</a>
         <ul>
            <li><a href='?pag=cadset'>Setores</a></li>
            <li><a href='?pag=cadsta'>Status</a></li>
			   <li><a href='?pag=cadfun'>Funcionarios</a></li>
         </ul>
      </li>
      <li><a href='index.php'>Sair</a></li>
   </ul>
</nav> <br> 
<script>
      $(function() {
		   /* Mobile */
		   $('#menu-wrap').prepend('<div id="menu-trigger">Menu</div>');		
		   $("#menu-trigger").on("click", function(){
			   $("#menu").slideToggle();
		   });
         $('#menu a').on("click", function (){
            $("#menu").slideUp();
         });
         // iPad
		   var isiPad = navigator.userAgent.match(/iPad/i) != null;
		   if (isiPad) $('#menu ul').addClass('no-transition');      
      });          
   </script>
