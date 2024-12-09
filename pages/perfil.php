<?php
session_start();

if (!isset($_SESSION['idcliente'])) {
  header('Location: ../index.php');
  exit;
}

include '../backend/conexao.php';
$conexao = novaConexao();

function formatarCPF($cpf)
{
  $cpf = preg_replace("/[^0-9]/", "", $cpf);
  return substr($cpf, 0, 3) . '.' . substr($cpf, 3, 3) . '.' . substr($cpf, 6, 3) . '-' . substr($cpf, 9, 2);
}

function formatarTelefone($telefone)
{
  $telefone = preg_replace("/[^0-9]/", "", $telefone);
  return '(' . substr($telefone, 0, 2) . ')' . substr($telefone, 2, 5) . '-' . substr($telefone, 7);
}

$stmt = $conexao->prepare("SELECT * FROM tbl_endereco WHERE id_endereco = ?");
$stmt->execute([$_SESSION['clienteindereco']]);
$endereco = $stmt->fetch(PDO::FETCH_ASSOC);

if ($stmt->rowCount() > 0) {
  $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $id = $_SESSION['idcliente'];
  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $data_nascimento = $_POST['data_nascimento'];
  $telefone = $_POST['telefone'];
  $cpf = $_POST['cpf'];

  $stmt = $conexao->prepare("UPDATE tbl_cliente SET cli_nome = ?, cli_email = ?, cli_dt_nascimento = ?, cli_telefone = ?, cli_cpf = ? WHERE id_cliente = ?");
  if ($stmt->execute([$nome, $email, $data_nascimento, $telefone, $cpf, $id])) {
    $mensagem = "Dados atualizados com sucesso!";
  } else {
    $mensagem = "Erro ao atualizar os dados.";
  }
}

$stmt = $conexao->prepare("SELECT * FROM tbl_cliente WHERE id_cliente = ?");
$stmt->execute([$_SESSION['idcliente']]);
$usuario = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Perfil</title>
  <link rel="stylesheet" href="../css/output.css">
  <link rel="icon" href="../img/iconJGM.png">
</head>

<body>

  <?php require_once '../utils/navbar.php'; ?>
  <div class="container mx-auto p-6">
    <div class="flex items-center space-x-4 mb-8">
      <div class="avatar placeholder">
        <div class="bg-neutral text-neutral-content w-24 rounded-full">
          <span class="text-3xl"><?= substr($_SESSION['clientenome'], 0, 1); ?></span>
        </div>
      </div>
      <div>
        <h2 class="text-2xl font-bold"><?= $_SESSION['clientenome'] ?></h2>
        <p class="text-sm text-gray-600"><?= $_SESSION['clienteemail'] ?></p>
        <button class="btn bg-myprimary hover:opacity-90 text-base-100" onclick="modalzin.showModal()">Editar Perfil</button>


        <dialog id="modalzin" class="modal">
          <form method="POST" class="modal-box space-y-4">
            <h3 class="text-lg font-bold">Edite seus dados</h3>

            <div class="form-control">
              <label class="label">
                <span class="label-text">Nome</span>
              </label>
              <input type="text" name="nome" placeholder="Altere seu nome" class="input input-bordered w-full" required />
            </div>

            <div class="form-control">
              <label class="label">
                <span class="label-text">E-mail</span>
              </label>
              <input type="email" name="email" placeholder="Altere seu e-mail" class="input input-bordered w-full" required />
            </div>

            <div class="form-control">
              <label class="label">
                <span class="label-text">Data de Nascimento</span>
              </label>
              <input type="date" name="data_nascimento" class="input input-bordered w-full" required />
            </div>

            <div class="form-control">
              <label class="label">
                <span class="label-text">Telefone</span>
              </label>
              <input type="tel" name="telefone" class="input input-bordered w-full" required maxlength="11" />
            </div>

            <div class="form-control">
              <label class="label">
                <span class="label-text">CPF</span>
              </label>
              <input type="text" name="cpf" placeholder="Altere seu CPF" class="input input-bordered w-full" required maxlength="11" />
            </div>

            <div class="modal-action">
              <button type="submit" class="btn btn-primary">Salvar</button>
              <button type="button" class="btn btn-secondary" onclick="document.getElementById('modalzin').close();">Cancelar</button>
            </div>
          </form>
        </dialog>

      </div>
    </div>

    <div class="flex flex-col lg:flex-row lg:justify-between lg:space-x-8">
      <div class="mb-8 lg:w-1/2">
        <h3 class="text-xl font-semibold mb-4">Informações Pessoais</h3>
        <div class="space-y-2">
          <p><strong>Data de Nascimento:</strong> <?= $_SESSION['clientedtnascimento'] ?></p>
          <p><strong>Endereço:</strong> <?= $endereco['end_rua'] ?>, <?= $endereco['end_numero'] ?></p>
          <p><strong>Telefone:</strong> <?= $_SESSION['clientetelefone'] ?></p>
        </div>
      </div>

      <div class="mb-8 lg:w-1/2 ml-auto">
        <h3 class="text-xl font-semibold mb-4">Histórico de Compras</h3>
        <?php 
        
        ?>
      </div>
    </div>
  </div>




  <a href="gerente/index.php">pagina gerente</a>

  <?php require_once '../utils/footer.php'; ?>
</body>

</html>