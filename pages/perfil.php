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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/output.css">
</head>
<body>

<?php  require_once '../utils/navbar.php'; ?>
<div >
    <div class="avatar placeholder">
      <div class="bg-neutral text-neutral-content w-24 rounded-full">
        <span class="text-3xl">D</span>
      </div>
    </div>
</div>



    <a href="gerente/index.php">pagina gerente</a>

<?php  require_once '../utils/footer.php'; ?>
</body>
</html>