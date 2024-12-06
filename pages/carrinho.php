<?php
session_start();
if (!isset($_SESSION['idcliente'])) {
    header('Location: login.php');
    exit;
}
include '../backend/conexao.php';

$conn = novaConexao();


// Verifica se o ID do produto está na URL
// if (isset($_GET['id'])) {
//     $idProduto = $_GET['id'];

// Exibe o ID para fins de depuração
//     echo "O ID do produto é: " . $idProduto;



$queryCarrinho = "
    SELECT p.* 
    FROM tbl_produto p
    JOIN tbl_detalhe_carrinho dc ON dc.det_id_produto = p.id_produto
    WHERE dc.det_id_carrinho = (
        SELECT id_carrinho 
        FROM tbl_carrinho 
        WHERE car_id_cliente = :idcliente
        LIMIT 1
    )
";
$stmtCarrinho = $conn->prepare($queryCarrinho);
$stmtCarrinho->bindValue(':idcliente', $_SESSION['idcliente'], PDO::PARAM_INT);
$stmtCarrinho->execute();

$produtosCarrinho = $stmtCarrinho->fetchAll(PDO::FETCH_ASSOC);

$queryAleatorios = "SELECT id_produto, pro_nome, pro_preco FROM tbl_produto ORDER BY RAND() LIMIT :quantidade";
$stmtAleatorios = $conn->prepare($queryAleatorios);
$quantidade = 5;
$stmtAleatorios->bindValue(':quantidade', $quantidade, PDO::PARAM_INT);
$stmtAleatorios->execute();


$produtosAleatorios = $stmtAleatorios->fetchAll(PDO::FETCH_ASSOC);







// Exibindo os resultados
// if ($produtos) {
// foreach ($produtos as $produto) {
// echo "Nome do Produto: " . $produto['pro_nome'] . "<br>";
// echo "Preço: " . $produto['pro_preco'] . "<br>";
// echo "Descrição: " . $produto['pro_marca'] . "<br>";
// // Você pode adicionar mais campos do produto aqui, conforme necessário
// }
// } else {
// echo "Nenhum produto encontrado no carrinho.";
// }

// // Busca o produto do banco de dados
// $produto = $stmt->fetch(PDO::FETCH_ASSOC);

// // Verifica se o produto foi encontrado
// if ($produto) {
// // Armazena cada campo da tabela em uma variável
// $nomeProduto = $produto['pro_nome'];
// $precoProduto = $produto['pro_preco'];
// $descricaoProduto = $produto['pro_descricao'];
// $estoqueProduto = $produto['pro_estoque'];
// $categoriaProduto = $produto['pro_categoria'];

// // Exemplo de exibição das variáveis (ou use conforme necessário no código)
// echo "<h1>Nome: $nomeProduto</h1>";
// echo "<p>Preço: R$ " . number_format($precoProduto, 2, ',', '.') . "</p>";
// echo "<p>Descrição: $descricaoProduto</p>";
// echo "<p>Estoque disponível: $estoqueProduto unidades</p>";
// echo "<p>Categoria: $categoriaProduto</p>";
// } else {
// echo "Produto não encontrado.";
// }
// } else {
// echo "Nenhum ID de produto foi fornecido.";
// }




?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seu carrinho</title>
    <link rel="stylesheet" href="../css/output.css">
    <link rel="icon" href="../img/iconJGM.png">

</head>

<body>

    <?php require_once '../utils/navbar.php'; ?>

    <div class="container mx-auto mt-10">
        <div class="flex flex-wrap md:flex-nowrap">
            <div class="w-full md:w-2/3 p-4">
                <h2 class="text-2xl font-bold mb-5">Seu Carrinho</h2>

                <?php if ($produtosCarrinho) {
                    foreach ($produtosCarrinho as $produto) {
                ?>
                        <div class="flex items-start mb-4 border-2 p-3 shadow-xl rounded-xl">
                            <img src="../img/camisetaTeste.webp" alt="Basic Tee Sienna" class="w-24 h-24 mr-4">
                            <div class="flex flex-col justify-between">
                                <div>
                                    <h3 class="text-lg font-bold"><?= $produto['pro_nome'] ?></h3>
                                    <p class="text-gray-700">dane-se</p>
                                    <p class="text-base-900 font-semibold">R$<?= $produto['pro_preco'] ?></p>
                                </div>
                                <div class="flex items-center justify-between">
                                    <select class="select select-error">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                    </select>
                                    <span class="text-sm text-green-500">Em Estoque</span>
                                </div>
                            </div>
                            <button class="ml-auto text-base-100 font-bold text-xl">×</button>
                        </div>
                <?php
                    }
                } else {
                    echo "Nenhum produto encontrado no carrinho.";
                } ?>

            </div>
            <div class="card bg-base-100 w-96 shadow-xl p-5">
                <h2 class="text-xl font-bold mb-3">Resumo da Compra</h2>
                <div class="flex justify-between mb-2">
                    <span>Subtotal</span>
                    <span>R$99.00</span>
                </div>
                <div class="flex justify-between mb-2">
                    <span>Envio Estimado</span>
                    <span>R$5.00</span>
                </div>
                <div class="flex justify-between font-bold text-lg mb-5">
                    <span>Total da compra</span>
                    <span>$112.32</span>
                </div>
                <button class="w-full bg-myprimary text-white p-3 rounded hover:bg-mysecondary transition-all duration-300 hover:text-black">Checkout</button>
            </div>
        </div>
    </div>
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-myprimary font-bold text-3xl">Produtos Populares</h1>
        <div class="overflow-x-auto p-10">
            <div class="flex space-x-16 min-w-max ">
                <?php if ($produtosAleatorios) {
                    foreach ($produtosAleatorios as $produto) { ?>
                        <div class="card w-64 bg-base-100 shadow-lg rounded-lg transform transition-transform duration-300 hover:scale-105 border  ">
                            <figure>
                                <img src="https://via.placeholder.com/256" alt="Imagem do Card" class="w-full h-32 object-cover rounded-t-lg">
                            </figure>
                            <div class="card-body text-black">
                                <h2 class="card-title text-base-800"><?= $produto['pro_nome'] ?></h2>
                                <p><?= $produto['pro_preco'] ?></p>
                                <div class="card-actions justify-end">
                                    <button class="btn bg-myprimary hover:bg-myprimary hover:opacity-90 text-white hover:text-black border-none w-full rounded-3xl p-1 m-1">Veja!</button>
                                </div>
                            </div>
                        </div>
                <?php }
                } ?>
            </div>
        </div>
    </div>

    <?php require_once '../utils/footer.php' ?>

</body>

</html>