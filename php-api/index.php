<?php 
error_reporting(0);

header('Access-Control-Allow-Origin: *');

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch($uri)
{
  case '/api':
    date_default_timezone_set('America/Sao_Paulo');
    $contents = file_get_contents("db.json");
    $json = json_decode($contents,true);

    $data_18_01 = "18/01/2023";
    $data_20_01 = "20/01/2023";
    

    for($i = 0; $i < count($json); $i ++){
        $dia = date("d/m/Y", strtotime($json[$i]['punchDateTime']));
        $hora = date("H:i", strtotime($json[$i]['punchDateTime']));
        $punchType = $json[$i]['punchType'];
        $nome = $json[$i]["employeeName"];

        if($dia == $data_18_01 ){
          if($punchType == 1){
            $hora_entrada =  $hora;
          }

          if($punchType == 2){
            $hora_saida = $hora;
          }

          if($hora_entrada > $hora_saida){
            $horas_trabalhadas = ($hora_entrada - $hora_saida);
          }else{
            $horas_trabalhadas =  ($hora_saida - $hora_entrada);
          }


         
          

        }


        if($dia == $data_20_01){
          if($punchType == 1){
            $total_entradas += $hora;
          }

          if($punchType == 2){
            $total_saidas += $hora;
          }

          if($total_entradas > $total_saidas ){
            $horas_trabalhadas  =  ($total_entradas - $total_saidas);
          }else{ 
            $horas_trabalhadas =  ($total_saidas - $total_entradas );
          }

        
        }


        $dados = [
          [
            "employeeName" => "$nome",
            "puncType" => "$dia",
            "entries" => [
              [
                "punchDateTime" => $json[$i]['punchDateTime'],
                "punchType" => $punchType
              ] 
              ],
              "amountOfHoursWorked" => $horas_trabalhadas
          ]
        ];

        var_dump($dados);
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

