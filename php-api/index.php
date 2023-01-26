<?php 


$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch($uri)
{
  case '/api':
    date_default_timezone_set('America/Sao_Paulo');
    $contents = file_get_contents("db.json");
    $json = json_decode($contents,true);
    

    for($i = 0; $i < count($json); $i ++){
        $dia = date("d/m/Y", strtotime($json[$i]['punchDateTime']));
        $hora = date("H:i", strtotime($json[$i]['punchDateTime']));
        $punchType = $json[$i]['punchType'];

    }


    /*foreach($json as $key => $dados){
   
        $dia = date("d/m/Y", strtotime($dados['punchDateTime']));
        $hora = date("H:i", strtotime($dados['punchDateTime']));
        $punchType = $dados['punchType'];


 
    
     }*/

    

    break;


    default:
      header("Location: /api");
    break;


}

