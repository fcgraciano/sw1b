<?php 

header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");//CORS 
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");

$conexao = new mysqli("localhost","root","","AulaSW");
if($conexao->connect_error)
{
    echo json_encode("{ 'Conexão Falhou': '".$conexao->connect_error."'}");
}
$MetodoHTTP = $_SERVER['REQUEST_METHOD'];
//echo $MetodoHTTP;

switch ($MetodoHTTP) {
    case 'GET':
        $sql = "Select * from SERVICOS";
        $resultado = $conexao->query($sql);
        if($resultado->num_rows > 0)
        {
            $resposta = [];
            while($linha = $resultado->fetch_assoc())
            {
                $resposta[] = $linha;
            }
            http_response_code(200);
            echo json_encode($resposta);
        }else{
            http_response_code(404);
            echo json_encode(['mensagem'=>'Nenhum registro encontrado']);
        }
        break;
    
    default:
        //Caso nenhuma opção seja a correta
        break;
}

?>