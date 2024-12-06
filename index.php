<?php
session_start();

$base_url = dirname($_SERVER["PHP_SELF"]);
$base_url = rtrim($base_url, '/pages/aliancas');


$clienteLogado = isset($_SESSION['idcliente']);

require 'backend/conexao.php';
$conn = novaConexao();

$query = "SELECT id_produto, pro_nome, pro_preco FROM tbl_produto ORDER BY RAND() LIMIT :quantidade";
$stmt = $conn->prepare($query);


$quantidade = 5;
$stmt->bindValue(':quantidade', $quantidade, PDO::PARAM_INT);

$stmt->execute();

$produtos = [];

if ($stmt->rowCount() > 0) {
  while ($produto = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $produtos[] = [
      'id' => $produto['id_produto'],
      'nome' => $produto['pro_nome'],
      'preco' => $produto['pro_preco']
    ];
  }
} else {
  echo "<p>Nenhum produto disponível.</p>";
}

?>

<!DOCTYPE html>
<html lang="pt-br" class="!scroll-smooth">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pagina Inicial</title>
  <link rel="stylesheet" href="css/output.css">
  <link rel="icon" href="img/iconJGM.png">
</head>

<body class="bg-base-100 scroll-smooth">

  <?php
  require_once 'utils/navbar.php';
  ?>

  <div class="carousel w-full bg-base-100">
    <div id="slide1" class="carousel-item relative w-full">
      <img
        src="img/banner 2.png"
        class="w-full" />
      <div class="absolute left-5 right-5 top-1/2 flex -translate-y-1/2 transform justify-between">
        <a href="#slide4" class="btn btn-circle btn-outline bg-myprimary">❮</a>
        <a href="#slide2" class="btn btn-circle btn-outline bg-myprimary">❯</a>
      </div>
    </div>
    <div id="slide2" class="carousel-item relative w-full">
      <img
        src="img/banner 1.png"
        class="w-full" />
      <div class="absolute left-5 right-5 top-1/2 flex -translate-y-1/2 transform justify-between">
        <a href="#slide1" class="btn btn-circle">❮</a>
        <a href="#slide3" class="btn btn-circle">❯</a>
      </div>
    </div>
    <div id="slide3" class="carousel-item relative w-full">
      <img
        src="img/banner 3.png"
        class="w-full" />
      <div class="absolute left-5 right-5 top-1/2 flex -translate-y-1/2 transform justify-between">
        <a href="#slide2" class="btn btn-circle">❮</a>
        <a href="#slide4" class="btn btn-circle">❯</a>
      </div>
    </div>
    <div id="slide4" class="carousel-item relative w-full">
      <img
        src="img/Teste dahora.png"
        class="w-full" />
      <div class="absolute left-5 right-5 top-1/2 flex -translate-y-1/2 transform justify-between">
        <a href="#slide3" class="btn btn-circle">❮</a>
        <a href="#slide1" class="btn btn-circle">❯</a>
      </div>
    </div>
  </div>

  <div class="bg-base-100 border-b-2 ">
    <div class="mx-auto grid max-w-2xl grid-cols-1 items-center gap-x-8 gap-y-16 px-4 py-24 sm:px-6 sm:py-32 lg:max-w-7xl lg:grid-cols-2 lg:px-8">
      <div>
        <h2 class="text-3xl font-bold tracking-tight text-myprimary sm:text-4xl">Joyce Galvão Modas</h2>
        <p class="mt-4 text-base-500">Estilo e sofisticação entregues na sua porta em Aparecida e região. Descubra as últimas tendências e transforme seu guarda-roupa com nossa seleção!</p>

        <dl class="mt-16 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 sm:gap-y-16 lg:gap-x-8">
          <div class="border-t border-gray-200 pt-4">
            <dt class="font-medium text-base-900">Lorem</dt>
            <dd class="mt-2 text-sm text-base-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam, atque!</dd>
          </div>
          <div class="border-t border-gray-200 pt-4">
            <dt class="font-medium text-base-900">Lorem</dt>
            <dd class="mt-2 text-sm text-base-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam, atque!</dd>
          </div>
          <div class="border-t border-gray-200 pt-4">
            <dt class="font-medium text-base-900">Lorem</dt>
            <dd class="mt-2 text-sm text-base-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam, atque!</dd>
          </div>
          <div class="border-t border-gray-200 pt-4">
            <dt class="font-medium text-base-900">Lorem</dt>
            <dd class="mt-2 text-sm text-base-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam, atque!</dd>
          </div>
          <div class="border-t border-gray-200 pt-4">
            <dt class="font-medium text-base-900">Lorem</dt>
            <dd class="mt-2 text-sm text-base-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam, atque!</dd>
          </div>
          <div class="border-t border-gray-200 pt-4">
            <dt class="font-medium text-base-900">Lorem</dt>
            <dd class="mt-2 text-sm text-base-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam, atque!</dd>
          </div>
        </dl>
      </div>
      <div class="grid grid-cols-2 grid-rows-2 gap-4 sm:gap-6 lg:gap-8">
        <img src="https://i.imgur.com/5cMdD7F.jpeg" class="rounded-lg bg-gray-100">
        <img src="https://picsum.photos/300/300?random=2" class="rounded-lg bg-gray-100">
        <img src="https://picsum.photos/300/300?random=3" class="rounded-lg bg-gray-100">
        <img src="https://picsum.photos/200/300?random=4" class="rounded-lg bg-gray-100">
      </div>
    </div>
  </div>

  <div class="container mx-auto px-4 py-6 ">
    <h1 class="text-myprimary font-bold text-3xl">Produtos Populares</h1>
    <div class="overflow-x-auto p-10">
      <div class="flex space-x-16 min-w-max ">
        <?php foreach ($produtos as $produto) { ?>
          <div class="card w-64 bg-base-100 shadow-lg rounded-lg transform transition-transform duration-300 hover:scale-105 border  ">
            <figure>
              <img src="https://picsum.photos/300/300?random" alt="Imagem do Card" class="w-full h-32 object-cover rounded-t-lg">
            </figure>
            <div class="card-body text-black">
              <h2 class="card-title text-base-800"><?= $produto['nome'] ?></h2>
              <p><?= $produto['preco'] ?></p>
              <div class="card-actions justify-end">
                <a class="btn bg-myprimary hover:bg-myprimary hover:opacity-90 text-white hover:text-black border-none w-full rounded-3xl p-1 m-1" href="pages/produto.php?id=<?php echo $produto['id']; ?>">
                  <button class="">Veja!</button>
                </a>
              </div>
            </div>
          </div>
        <?php } ?>

      </div>
    </div>
  </div>

  <?php

  require_once 'utils/footer.php';
  ?>


</body>

</html>