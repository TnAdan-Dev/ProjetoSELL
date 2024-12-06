<?php
session_start();

$base_url = dirname($_SERVER["PHP_SELF"]);
$base_url = rtrim($base_url, '/pages/aliancas');


$clienteLogado = isset($_SESSION['idcliente']);

if (!isset($_SESSION['idcliente'])) {
  header('Location: ../index.php');
  exit;
}


?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../css/output.css">
  <link rel="icon" href="../img/iconJGM.png">
</head>

<body>

  <?php require_once '../utils/navbar.php'; ?>
  <div class="container mx-auto p-6">
    <div class="flex items-center space-x-4 mb-8">
      <div class="avatar placeholder">
        <div class="bg-neutral text-neutral-content w-24 rounded-full">
          <span class="text-3xl">D</span>
        </div>
      </div>
      <div>
        <h2 class="text-2xl font-bold">Nome Completo</h2>
        <p class="text-sm text-gray-600">user@example.com</p>
        <button class="btn btn-primary mt-2">Editar Perfil</button>
      </div>
    </div>

    <div class="mb-8">
      <h3 class="text-xl font-semibold mb-4">Informações Pessoais</h3>
      <div class="space-y-2">
        <p><strong>Data de Nascimento:</strong> 01/01/1990</p>
        <p><strong>Endereço:</strong> Rua Exemplo, 123</p>
        <p><strong>Telefone:</strong> (11) 1234-5678</p>
      </div>
    </div>

    <div class="mb-8">
      <h3 class="text-xl font-semibold mb-4">Ações da Conta</h3>
      <div class="space-y-4">
        <button class="btn btn-secondary w-full">Alterar Senha</button>
        <button class="btn btn-error w-full">Excluir Conta</button>
      </div>
    </div>

    <div class="mb-8">
      <h3 class="text-xl font-semibold mb-4">Histórico de Compras</h3>
      <ul class="space-y-2">
        <li class="flex justify-between">
          <span>Produto 1</span>
          <span class="badge badge-success">Entregue</span>
        </li>
        <li class="flex justify-between">
          <span>Produto 2</span>
          <span class="badge badge-warning">Pendente</span>
        </li>
      </ul>
    </div>
  </div>




  <a href="gerente/index.php">pagina gerente</a>

  <?php require_once '../utils/footer.php'; ?>
</body>

</html>