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
        $sql = "Select * from CLIENTES";
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
    case 'POST':
        $data = json_decode(file_get_contents("php://input"), true);

        if (!isset($data['nome']) || !isset($data['email']) || !isset($data['telefone'])) {
            http_response_code(400);
            echo json_encode(['mensagem' => 'Dados incompletos. Envie nome, email e telefone.']);
            break;
        }
    
        $nome = $data['nome'];
        $email = $data['email'];
        $telefone = $data['telefone'];
    
        // Prepared Statement
        $stmt = $conexao->prepare("INSERT INTO CLIENTES (nome, email, telefone) VALUES (?, ?, ?)");
    
        if ($stmt === false) {
            http_response_code(500);
            echo json_encode(['mensagem' => 'Erro ao preparar statement', 'erro' => $conexao->error]);
            break;
        }
    
        // bind_param: "sss" → 3 strings
        $stmt->bind_param("sss", $nome, $email, $telefone);
    
        if ($stmt->execute()) {
            http_response_code(201);
            echo json_encode([
                'mensagem' => 'Cliente inserido com sucesso',
                'id_gerado' => $stmt->insert_id
            ]);
        } else {
            http_response_code(500);
            echo json_encode([
                'mensagem' => 'Erro ao inserir cliente',
                'erro' => $stmt->error
            ]);
        }
            break;
          
    default:
        //Caso nenhuma opção seja a correta
        break;
}

?>