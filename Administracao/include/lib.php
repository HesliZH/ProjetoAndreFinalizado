<?php
   class banco{
      public $cnx, $res, $cheader, $combobox;
      function __construct() {
         $this->cnx=pg_connect("host=127.0.0.1 dbname=ouvidoria user=postgres password=postgres") or die ("Nao conectou");
      } 
      function consulta($sql){
         $this->res=@pg_query($sql); 
      }
      function lista2($name='tabela1',$inc='',$alt='',$exc='',$img='') {
         if($inc) echo("<p align=\"center\"><a class=\"btn btn-danger\" href=\"$inc\">Incluir</a></p>");
         echo("<table id='$name' class='display' cellspacing='0' width='100%'>");
         echo("<thead><tr>");
         for($c=0;$c<count($this->cheader);$c++){
            echo("<th>".$this->cheader[$c]."</th>");
         }
         echo("</tr></thead><tbody>");
         $n=pg_num_fields($this->res);
         $codigo=@pg_field_name($this->res,0);
         while($line=@pg_fetch_object($this->res)){
            echo("<tr>");
            for($c=0; $c<$n;$c++){ 
               $campo=@pg_field_name($this->res,$c);
               echo("<td>".$line->$campo."</td>");
            }
            if($alt or $exc or $img){
               echo("<td align=center>");
               if($alt) echo("<a style=\"width:80px\" class=\"btn btn-danger\" href=\"$alt?alt=".$line->$codigo."\">Alterar</a> ");
               if($exc) echo("<a style=\"width:80px\" class=\"btn btn-danger\" href=\"$exc?exc=".$line->$codigo."\">Excluir</a> ");
               if($img) echo("<a style=\"width:80px\" class=\"btn btn-danger\" href=\"$img?cod=".$line->$codigo."\">Imgs</a> ");
               echo("</td>");
            }   
            echo("</tr>");
         }        
         echo("</tbody></table>");
         echo("  <script> $(document).ready(function() { $('#$name').DataTable({
            'language': {'url': 'http://cdn.datatables.net/plug-ins/1.10.15/i18n/Portuguese-Brasil.json'},
            responsive: true,columnDefs: [
               { responsivePriority: 1, targets: -1 },
               { responsivePriority: 2, targets: 2 },
               { type: 'portugues', targets: 'all' }
            ],
            }); } ); </script>");
      }  
      function grava($sql,$certo,$erro,$local){
         $this->grv=pg_query($sql);
         if($this->grv){
             printf("<script> alert ('$certo'); document.location.href='$local'; </script>");
         }else{
             printf("<script> alert ('$erro'); document.location.href='$local'; </script>");
         }
      }
   }
   
   ///////////////////////////////////Classes de Cabeçalho e Rodapé/////////////////////q
   function head(){
      echo('
  <!DOCTYPE html>
     <html>
        <head>
	       <meta charset="UTF-8">
	       <script language="javascript" src="include/DT/media/js/jquery.js"></script>
               <script language="javascript" src="include/DT/media/js/jquery.dataTables.min.js"></script>
               <script src="include/DT/extensions/Responsive/js/dataTables.responsive.min.js"></script>
               <link rel="stylesheet" href="include/bootstrap-4.0.0/dist/css/bootstrap.min.css">
               <link rel="stylesheet" href="include/DT/media/css/jquery.dataTables.min.css" type="text/css">
               <link rel="stylesheet" href="include/menu.css" type="text/css">
           <link rel="stylesheet" href="include/estilo.css" type="text/css">
      	</head>
        <body bgcolor="#DDDDFF">');
   }
   function foot(){
      echo("</body></html>");
   }
   ////////////////////////////////////////////////Classe de formulario///////////////////////////////////////////////////////////////////////////
   class form{
      public $campo=array();
      public $titulo,$method='POST',$action='';
      function __construct($titulo='Formulário',$action='',$method=''){
         $this->titulo=$titulo;
         $this->action=$action;
         $this->method=$method;
      }
      function text($name='obj',$caption='Campo',$size=30,$maxlenght='',$obrig=''){
         $this->campo[$name]['type']='text';
         $this->campo[$name]['name']=$name;
         $this->campo[$name]['caption']=$caption;
         $this->campo[$name]['size']=$size;
         $this->campo[$name]['maxlenght']=$maxlenght;
         $this->campo[$name]['obrig']=$obrig;
      }
      function time($name='obj',$caption='Campo',$obrig=''){
         $this->campo[$name]['type']='time';
         $this->campo[$name]['name']=$name;
         $this->campo[$name]['caption']=$caption;
         $this->campo[$name]['obrig']=$obrig;
      }
      function date($name='obj',$caption='Campo',$obrig=''){
         $this->campo[$name]['type']='date';
         $this->campo[$name]['name']=$name;
         $this->campo[$name]['caption']=$caption;
         $this->campo[$name]['obrig']=$obrig;
      } 
      function hidden($name='obj',$value=''){
         $this->campo[$name]['type']='hidden';
         $this->campo[$name]['name']=$name;
         $this->campo[$name]['value']=$value;
      }
      function password($name='obj',$caption='Senha',$size=30,$maxlenght='',$obrig=''){
         $this->campo[$name]['type']='password';
         $this->campo[$name]['name']=$name;
         $this->campo[$name]['caption']=$caption;
         $this->campo[$name]['size']=$size;
         $this->campo[$name]['maxlenght']=$maxlenght;
         $this->campo[$name]['obrig']=$obrig;
      }
      function select($name='obj',$caption='Selecione',$options=array('selecione'),$obrig=''){
         $this->campo[$name]['type']='select';
         $this->campo[$name]['name']=$name;
         $this->campo[$name]['caption']=$caption;
         $this->campo[$name]['options']=$options;
         $this->campo[$name]['obrig']=$obrig;
      }
      function dbselect($name='obj',$caption='Selecione',$res,$obrig=''){
         $this->campo[$name]['type']='dbselect';
         $this->campo[$name]['name']=$name;
         $this->campo[$name]['caption']=$caption;
         $campo1=@pg_field_name($res,0);
         $campo2=@pg_field_name($res,1);
         while($reg=@pg_fetch_object($res)){
            $options_id[]=$reg->$campo1;
            $options_dt[]=$reg->$campo2;
         }
         $this->campo[$name]['options_id']=$options_id;
         $this->campo[$name]['options_dt']=$options_dt;
         $this->campo[$name]['obrig']=$obrig;
      }
      function radio($name='obj',$caption='Selecione',$options=array('1','2'),$labels=array('label1','label2')){
         $this->campo[$name]['type']='radio';
         $this->campo[$name]['name']=$name;
         $this->campo[$name]['caption']=$caption;
         $this->campo[$name]['options']=$options;
         $this->campo[$name]['labels']=$labels;
      }
      function imagem($name='obj',$caption='Campo',$obrig=''){
         $this->campo[$name]['type']='file';
         $this->campo[$name]['name']=$name;
         $this->campo[$name]['caption']=$caption;
         $this->campo[$name]['obrig']=$obrig;
      }
      function carrega($res){
         if(!@pg_num_rows($res)) die("Consulta não retornou registros");
         $reg=@pg_fetch_object($res);
         foreach(array_keys($this->campo) as $key){
            @$this->campo[$key]['value']=$reg->$key;
         }   
      }
      function show($name='frm'){
         echo("<script language=\"javascript\">");
         echo("   function valida$name(){ \n");
         echo("      var erro='';\n");
         foreach(array_keys($this->campo) as $key){
            if(@$this->campo[$key]['obrig']!=''){
               echo("      if(document.$name.".$this->campo[$key]['name'].".value==''){erro+='Verifique o campo \"".$this->campo[$key]['caption']."\" preenchido incorretamente...\\n';}\n");
            }
         }
         echo("      if (erro==''){document.$name.submit();}else{alert(erro);}\n");
         echo("   }\n");
	      echo("</script>");   
	      echo("<div class=\"container\">");
         echo("<form name=\"$name\" action=\"".$this->action."\" method=\"".$this->method."\" enctype=\"multipart/form-data\">\n");
         echo("<div class=\"alert alert-danger\" align=\"center\"><b>$this->titulo</b></div>\n");
         foreach(array_keys($this->campo) as $key){
            if(@$this->campo[$key]['maxlenght']){$maxlenght=" maxlenght=\"".$this->campo[$key]['maxlenght']."\" ";}else{$maxlenght='';}
            if($this->campo[$key]['type']=='text'){
               echo("<div class=\"form-group\"><label for=\"$key\">".$this->campo[$key]['caption']."</label><input type=\"text\" class=\"form-control\" id=\"$key\" name=\"$key\" $maxlenght value=\"".$this->campo[$key]['value']."\" aria-describedby=\"H$key\"><small id=\"H$key\" class=\"form-text text-muted\">".$this->campo[$key]['obs']."</small></div>");
	         }elseif($this->campo[$key]['type']=='file'){
               echo("<div class=\"form-group\"><label for=\"$key\">".$this->campo[$key]['caption']."</label><input type=\"file\" class=\"form-control\" id=\"$key\" name=\"$key\" value=\"".$this->campo[$key]['value']."\" aria-describedby=\"H$key\"><small id=\"H$key\" class=\"form-text text-muted\">".$this->campo[$key]['obs']."</small></div>");
	         }elseif($this->campo[$key]['type']=='select'){
               echo("<div class=\"form-group\"><label for=\"$key\">".$this->campo[$key]['caption']."</label><select class=\"form-control\" id=\"$key\" name=\"$key\" aria-describedby=\"H$key\">");
	            echo("<option value=''> Selecione</option>\n");
               for($c=0;$c<count($this->campo[$key]['options']);$c++){
                  if($this->campo[$key]['value']==$this->campo[$key]['options'][$c]){$sel="selected";}else{$sel="";}
                  echo("<option $sel value=\"".$this->campo[$key]['options'][$c]."\">".$this->campo[$key]['options'][$c]."</option>\n");
               }
               echo("</select>");
               echo("<small id=\"H$key\" class=\"form-text text-muted\">".$this->campo[$key]['obs']."</small></div>");
	         }elseif($this->campo[$key]['type']=='time'){
               echo("<div class=\"form-group\"><label for=\"$key\">".$this->campo[$key]['caption']."</label><input type=\"time\" class=\"form-control\" id=\"$key\" name=\"$key\" value=\"".$this->campo[$key]['value']."\" aria-describedby=\"H$key\"><small id=\"H$key\" class=\"form-text text-muted\">".$this->campo[$key]['obs']."</small></div>");
            }elseif($this->campo[$key]['type']=='date'){
               echo("<div class=\"form-group\"><label for=\"$key\">".$this->campo[$key]['caption']."</label><input type=\"date\" class=\"form-control\" id=\"$key\" name=\"$key\" $maxlenght value=\"".$this->campo[$key]['value']."\" aria-describedby=\"H$key\"><small id=\"H$key\" class=\"form-text text-muted\">".$this->campo[$key]['obs']."</small></div>");
            }elseif($this->campo[$key]['type']=='dbselect'){
               echo("<div class=\"form-group\"><label for=\"$key\">".$this->campo[$key]['caption']."</label><select name=\"$key\" class=\"form-control\" id=\"$key\" aria-describedby=\"H$key\">");
               echo("<option value=''> Selecione</option>\n");
	            for($c=0;$c<count($this->campo[$key]['options_id']);$c++){
                  if($this->campo[$key]['value']==$this->campo[$key]['options_id'][$c]){$sel="selected";}else{$sel="";}
                  echo("<option $sel value=\"".$this->campo[$key]['options_id'][$c]."\">".$this->campo[$key]['options_dt'][$c]."</option>\n");
               }
               echo("</select>");
               echo("<small id=\"H$key\" class=\"form-text text-muted\">".$this->campo[$key]['obs']."</small></div>");
	         }elseif($this->campo[$key]['type']=='radio'){
               echo("<div class=\"form-group form-check-inline\"><label for=\"$key\">".$this->campo[$key]['caption']."&nbsp&nbsp&nbsp</label>\n");
               for($c=0;$c<count($this->campo[$key]['options']);$c++){
                  if(@$this->campo[$key]['value']==$this->campo[$key]['options'][$c]){$sel="selected";}else{$sel="";}
                  echo("<input type=\"radio\" name=\"".$this->campo[$key]['name']."\" value=\"".$this->campo[$key]['options'][$c]."\" id=\"$key\"> ".$this->campo[$key]['labels'][$c]."&nbsp&nbsp&nbsp&nbsp<br>\n");
               }
               echo("</div>\n");
            }elseif($this->campo[$key]['type']=='password'){
               echo("<div class=\"form-group\"><label for=\"$key\">".$this->campo[$key]['caption']."</label><input type=\"password\" class=\"form-control\" name=\"$key\" id=\"$key\" value=\"".$this->campo[$key]['value']."\" aria-describedby=\"H$key\"><small id=\"H$key\" class=\"form-text text-muted\">".$this->campo[$key]['obs']."</small></div>");
            }elseif($this->campo[$key]['type']=='hidden'){
               echo("<input type=\"".$this->campo[$key]['type']."\" name=\"".$this->campo[$key]['name']."\" value=\"".$this->campo[$key]['value']."\">\n");
            }     
         }
         echo("<div align=\"center\"><input style=\"width:200px\" class=\"btn btn-outline-danger\"  type=\"button\" value=\"CANCELAR\" onclick=\"history.go(-1)\"><input style=\"width:200px\" class=\"btn btn-info\"  type=\"button\" value=\"SALVAR\" onclick=\"valida$name()\"></div>\n");
         echo("</form>\n</div>\n");
      }
   }
?>
