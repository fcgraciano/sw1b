<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
</head>
<body>

<h1>Echo</h1>
<?php echo "Escrevendo na tela"; ?>

<?php $nome = "Prof Fernando"; ?>

<h2>If</h2>
<?php 
    if($nome == "Prof Fernando")
    {
        echo "É sim o prof f***";
    }else{
        echo "Não é o prof certo";
    }
?>

<h2>Listas, Array chave Valor</h2>
<?php 

    $minhaLista = [];
    $minhaLista[] = "Item 1";
    $minhaLista[] = "Laranja";
    $minhaLista[] = "Gol 1.6";
    $minhaLista[] = "Casa Container";

    echo "<pre>";
    print_r($minhaLista);
    echo "</pre>";

    echo "<ol>";
    for($i = 0; $i < count($minhaLista); $i++)
    {
        echo "<li> $minhaLista[$i] </li>";
    }
    echo "</ol>";

    $i = 0;
    while($i < count($minhaLista))
    {
        echo "<h3> $minhaLista[$i] </h3>";
        $i++;
    }

    echo "<table border='2'>";
    foreach($minhaLista as $item)
    {
        echo "<tr><td>$item</td></tr>";
    }
    echo "</table>";

    $professores = [];
    $professores[] = [
                        "Id"=>"1",
                        "Nome"=>"Fernando",
                        "Ativo"=>"1" 
                    ];


    $professores[] =  [
                        "Id"=>"2",
                        "Nome"=>"Ana Paula",
                        "Ativo"=>"1" 
                      ];

    $professores[] =  [
                        "Id"=>"3",
                        "Nome"=>"Galvani",
                        "Ativo"=>"0" 
                      ];
   echo "<table border='2'>";                
   foreach($professores as $professor)
   {
        echo "<tr>
                <td>$professor[Id]</td>
                <td>$professor[Nome]</td>
                <td>$professor[Ativo]</td>
            </tr>";
   }               
   echo "</table>";






?>

</body>
</html>