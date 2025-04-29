<?php
    header("Content-Type: application/json; charset=UTF-8");

    $metodo = $_SERVER['REQUEST_METHOD'];

    $arquivo = "users.json";

    if(!file_exists($arquivo)){
        file_put_contents($arquivo, json_encode([], JSON_PRETTY_PRINT || JSON_UNESCAPED_UNICODE));
    }
    
    $usuarios = json_decode(file_get_contents($arquivo), true);

    switch($metodo){
        case 'GET':
            //echo "Ações do método GET ";
            
            if(isset($_GET["id"])){
                $id = intval($_GET["id"]);
                $achou = null;

                foreach($usuarios as $usuario){
                    if($usuario['id'] == $id){
                        $achou = $usuario;
                        break;
                    }
                }

                if($achou){
                    echo json_encode($achou, JSON_PRETTY_PRINT || JSON_UNESCAPED_UNICODE);
                }
                else{
                    http_response_code(400);
                    echo json_encode(["erro" => "Usuário invalido"], JSON_UNESCAPED_UNICODE);
                }
            }else{
                echo json_encode($usuarios, JSON_PRETTY_PRINT || JSON_UNESCAPED_UNICODE);
            }

            break;
        case 'POST':
            //echo "Ações do método POST";
            $dados = json_decode(file_get_contents('php://input'), true);

            if(!isset($dados["nome"]) || !isset($dados["email"])){
                http_response_code(400);
                echo json_encode(["erro" => "Dados invalidos foram encontrados"], JSON_UNESCAPED_UNICODE);
                exit;
            }

            $novo_id = 1;
            if(!empty($usuarios)){
                $ids = array_column($usuarios, "id");
                $novo_id = max($ids) + 1;
            }

            $novoUsuario = [
                "id" => $novo_id,
                "nome" => $dados["nome"],
                "email" => $dados["email"]
            ];

            $usuarios[] = $novoUsuario;

            file_put_contents($arquivo, json_encode($usuarios, JSON_PRETTY_PRINT || JSON_UNESCAPED_UNICODE));
            echo json_encode(["mensagem" => "Usuário inserido com sucesso!:D ", "usuarios" => $usuarios], JSON_UNESCAPED_UNICODE);

            break;
            case 'PUT':
                // Atualizar um usuário existente
                $dados = json_decode(file_get_contents('php://input'), true);
    
                if (!isset($_GET['id'])) {
                    http_response_code(400);
                    echo json_encode(["erro" => "ID não informado"], JSON_UNESCAPED_UNICODE);
                    exit;
                }
    
                $id = intval($_GET['id']);
                $usuarioAtualizado = null;
    
                foreach ($usuarios as $index => $usuario) {
                    if ($usuario['id'] === $id) {
                        if (isset($dados['nome'])) {
                            $usuarios[$index]['nome'] = $dados['nome'];
                        }
                        if (isset($dados['email'])) {
                            $usuarios[$index]['email'] = $dados['email'];
                        }
                        $usuarioAtualizado = $usuarios[$index];
                        break;
                    }
                }
    
                if ($usuarioAtualizado) {
                    file_put_contents($arquivo, json_encode($usuarios, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
                    echo json_encode(["mensagem" => "Usuário atualizado com sucesso", "usuario" => $usuarioAtualizado], JSON_UNESCAPED_UNICODE);
                } else {
                    http_response_code(404);
                    echo json_encode(["erro" => "Usuário não encontrado"], JSON_UNESCAPED_UNICODE);
                }
    
                break;
                case 'DELETE':
                    // Remover um usuário pelo ID
                    if (!isset($_GET['id'])) {
                        http_response_code(400);
                        echo json_encode(["erro" => "ID não informado"], JSON_UNESCAPED_UNICODE);
                        exit;
                    }
        
                    $id = intval($_GET['id']);
                    $encontrado = false;
        
                    foreach ($usuarios as $index => $usuario) {
                        if ($usuario['id'] === $id) {
                            unset($usuarios[$index]);
                            $usuarios = array_values($usuarios); // Reorganiza os índices
                            $encontrado = true;
                            break;
                        }
                    }
        
                    if ($encontrado) {
                        file_put_contents($arquivo, json_encode($usuarios, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
                        echo json_encode(["mensagem" => "Usuário deletado com sucesso"], JSON_UNESCAPED_UNICODE);
                    } else {
                        http_response_code(404);
                        echo json_encode(["erro" => "Usuário não encontrado"], JSON_UNESCAPED_UNICODE);
                    }
        
                    break;
            
        default:
            http_response_code(405);
            echo json_encode(["erro" => "Método invalido"], JSON_UNESCAPED_UNICODE);
            break;
    }
?>