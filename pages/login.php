<?php
session_start();
if (isset($_SESSION['idcliente'])) {
  header('Location: ../index.php');
  exit;
}

include '../backend/conexao.php';

$loginErro = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $email = $_POST['email'];
  $senha = $_POST['senha'];

  $conexao = novaConexao();

  $stmt = $conexao->prepare("SELECT * FROM tbl_cliente WHERE cli_email = ?");
  $stmt->execute([$email]);

  if ($stmt->rowCount() > 0) {
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($senha = $usuario['cli_senha']) {
      $_SESSION['idcliente'] = $usuario['id_cliente'];
      $_SESSION['clientenome'] = $usuario['cli_nome'];
      $_SESSION['clienteemail'] = $usuario['cli_email'];
      $_SESSION['clientetelefone'] = $usuario['cli_telefone'];
      $_SESSION['clientedtnascimento'] = $usuario['cli_dt_nascimento'];
      $_SESSION['clienteindereco'] = $usuario['cli_id_endereco'];
      header('Location: ../index.php'); 
      exit;
    } else {
      $loginErro = true;
    }
  } else {
    $loginErro = true;
  }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Joyce Galvão Modas</title>
  <link rel="stylesheet" href="../css/login.css" />
  <link rel="icon" href="../img/iconJGM.png">
  </link>
</head>

<body>



  <section id="content" class="container">

    <div class="image-section">
      <div class="image-wrapper">
        <img src="../img/roupas.jpg" alt="" id="">
      </div>

      <div class="content-container">
        <h1 class="section-heading"><img id="logImg" src="../img/LogoJGM.png" alt=""></h1>
      </div>
    </div>

    <div class="form-section">

      <div class="form-wrapper">

        <h2>Log-in</h2>
        <p>Insira suas credenciais para acessar sua conta.</p>
        <form method="post">
          <div class="input-container">
            <?php if ($loginErro): ?>
              <div class="alert">
                Usuário ou senha incorretos, burro. Tente novamente!
              </div>
            <?php endif; ?>
            <div class="form-group">
              <label for="email">Email</label>
              <input name="email" type="email" id="email" autocomplete="off">
            </div>
            <div class="form-group">
              <label for="password">Senha</label>
              <input name="senha" type="password" id="password">
            </div>
          </div>

          <button id="loginBtn" class="login-btn">Entrar</button>
        </form>
        <div class="or-divider">não possui conta?</div>
        <button class="google-signin">

          <span><a href="cadastro.php">Cadastre-se</a></span>
        </button>
        <div class="or-divider"><a href="../index.php">Voltar</div>
      </div>

    </div>

  </section>

  <script>
    function mudaImagem() {
      let imagem = document.getElementById('logImg')
      if (window.innerWidth <= 800) {
        imagem.src = '../img/logoJGMsm.png'
      } else(
        imagem.src = '../img/logoJGM.png'
      )
      window.onload = mudaImagem;
      window.onresize = mudaImagem;
    }
  </script>
</body>

</html>