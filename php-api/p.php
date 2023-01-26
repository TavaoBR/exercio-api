<?php 
date_default_timezone_set('America/Sao_Paulo');
    
$contents = file_get_contents("db.json");
$json = json_decode($contents,true);

 


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php 
foreach($json as $key => $dados){
   
    $dia = date("d/m/Y", strtotime($dados['punchDateTime']));
    $hora = date("H:i", strtotime($dados['punchDateTime']));
    
    
    
    echo "<input type='text' value='$hora'>";
 }
?>
    
</body>
</html>