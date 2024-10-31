<?php
header("Content-Type: application/json");
include 'config_cadastro.php';

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'POST':
        $data = json_decode(file_get_contents("php://input"), true);

        // Verifica se todos os campos obrigatórios estão presentes
        if (isset($data['first-name'], $data['last-name'], $data['email'], $data['telefone'], $data['cpf'], $data['date-nascimento'], $data['password'], $data['estado'], $data['cidade'], $data['rua'], $data['numero'], $data['cep'])) {

            // Verificação de idade
            $dataNascimento = new DateTime($data['date-nascimento']);
            $hoje = new DateTime();
            $idade = $hoje->diff($dataNascimento)->y;

            if ($idade < 18) {
                echo json_encode(["erro" => "Usuário deve ter 18 anos ou mais."]);
                exit;
            }

            // Verifica se o e-mail já está cadastrado
            $stmt = $conn->prepare("SELECT * FROM usuarios WHERE email = :email");
            $stmt->execute(['email' => $data['email']]);
            if ($stmt->fetch(PDO::FETCH_ASSOC)) {
                echo json_encode(["erro" => "E-mail já cadastrado."]);
                exit;
            }

            // Verifica se o CPF já está cadastrado
            $stmt = $conn->prepare("SELECT * FROM usuarios WHERE cpf = :cpf");
            $stmt->execute(['cpf' => $data['cpf']]);
            if ($stmt->fetch(PDO::FETCH_ASSOC)) {
                echo json_encode(["erro" => "CPF já cadastrado."]);
                exit;
            }

            // Verifica se o endereço completo já está cadastrado
            $stmt = $conn->prepare("SELECT * FROM usuarios WHERE estado = :estado AND cidade = :cidade AND rua = :rua AND numero = :numero AND cep = :cep");
            $stmt->execute([
                'estado' => $data['estado'],
                'cidade' => $data['cidade'],
                'rua' => $data['rua'],
                'numero' => $data['numero'],
                'cep' => $data['cep']
            ]);
            if ($stmt->fetch(PDO::FETCH_ASSOC)) {
                echo json_encode(["erro" => "Endereço já cadastrado."]);
                exit;
            }

            // Insere o novo usuário no banco de dados
            $stmt = $conn->prepare("INSERT INTO usuarios (first_name, last_name, email, telefone, cpf, data_nascimento, estado, cidade, rua, numero, cep, senha) VALUES (:first_name, :last_name, :email, :telefone, :cpf, :data_nascimento, :estado, :cidade, :rua, :numero, :cep, :senha)");

            $stmt->execute([
                'first_name' => $data['first-name'],
                'last_name' => $data['last-name'],
                'email' => $data['email'],
                'telefone' => $data['telefone'],
                'cpf' => $data['cpf'],
                'data_nascimento' => $data['date-nascimento'],
                'estado' => $data['estado'],
                'cidade' => $data['cidade'],
                'rua' => $data['rua'],
                'numero' => $data['numero'],
                'cep' => $data['cep'],
                'senha' => password_hash($data['password'], PASSWORD_DEFAULT)
            ]);

            echo json_encode(["sucesso" => "Cadastro realizado com sucesso!"]);
        } else {
            echo json_encode(["erro" => "Dados incompletos para cadastro."]);
        }
        break;

    default:
        echo json_encode(["erro" => "Método não suportado"]);
        break;
}
?>

