<?php 
$dados = null;

if (isset($_GET['cep'])){
    $cep = preg_replace('/[^0-9]/', '', $_GET['cep']);
    $url = "https://viacep.com.br/ws/$cep/json/";
    $response = file_get_contents($url);
    $dados = json_decode($response, true);
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Encontar CEP</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h1>Encontra CEP</h1>

  <form action="" method="GET">
        <label for="cep">Digite o CEP:</label>
        <input type="text" id="cep" name="cep" value="<?= isset($_GET['cep']) ? $_GET['cep'] : '' ?>" required>
        <button type="submit">Consultar</button>
    </form>

    <?php if ($dados=== null && isset($_GET['cep'])): ?>
        <p>CEP não encontrado ou inválido. Por favor, verifique o CEP informado.</p>
    <?php elseif ($dados!== null): ?>
        <h2>Informações do CEP <?= htmlspecialchars($_GET['cep']); ?>:</h2>
        <p><strong>Logradouro:</strong> <?= htmlspecialchars($dados['logradouro']); ?></p>
        <p><strong>Bairro:</strong> <?= htmlspecialchars($dados['bairro']); ?></p>
        <p><strong>Cidade:</strong> <?= htmlspecialchars($dados['localidade']); ?></p>
        <p><strong>Estado:</strong> <?= htmlspecialchars($dados['uf']); ?></p>
        <p><strong>Complemento:</strong> <?= htmlspecialchars($dados['complemento']); ?></p>
    <?php endif; ?>

</body>
</html>