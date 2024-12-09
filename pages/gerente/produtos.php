<?php
session_start();

include '../../backend/conexao.php';

$conexao = novaConexao();

$stmt_categoria = $conexao->prepare("SELECT * FROM tbl_categoria");
$stmt_categoria->execute();
$categorias = $stmt_categoria->fetchAll(PDO::FETCH_ASSOC);

$stmt_tamanho = $conexao->prepare("SELECT * FROM tbl_tamanho");
$stmt_tamanho->execute();
$tamanhos = $stmt_tamanho->fetchAll(PDO::FETCH_ASSOC);

$stmt_material = $conexao->prepare("SELECT * FROM tbl_material");
$stmt_material->execute();
$materiais = $stmt_material->fetchAll(PDO::FETCH_ASSOC);

$stmt_cor = $conexao->prepare("SELECT * FROM tbl_cor");
$stmt_cor->execute();
$cores = $stmt_cor->fetchAll(PDO::FETCH_ASSOC);

$stmt_produto = $conexao->prepare("SELECT * FROM tbl_produto");
$stmt_produto->execute();
$produtos = $stmt_produto->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="../../css/output.css">
    <link rel="icon" href="../../img/iconJGM.png">
    <title>Dashboard</title>
</head>

<body class="text-gray-800">


    <div class="fixed left-0 top-0 w-64 h-full bg-gray-900 p-4 z-50 sidebar-menu transition-transform">
        <a href="#" class="flex items-center pb-4 border-b border-b-gray-800">
            <img src="../../img/iconJGM.png" alt="" class="w-8 h-8 rounded object-cover">
            <span class="text-lg font-bold text-white ml-3">Gerenciar</span>
        </a>
        <ul class="mt-4 transition-all duration-300">
            <li class="mb-1 group">
                <a href="index.php" class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100 transition-all duration-300">
                    <i class="ri-home-2-line mr-3 text-lg"></i>
                    <span class="text-sm">Visão Geral</span>
                </a>
            </li>
            <li class="mb-1 group active">
                <a href="produtos.php" class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100 transition-all duration-300">
                    <i class="ri-instance-line mr-3 text-lg"></i>
                    <span class="text-sm">Produtos</span>
                </a>
            </li>
            <li class="mb-1 group">
                <a href="pedidos.php" class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100 transition-all duration-300">
                    <i class="ri-flashlight-line mr-3 text-lg"></i>
                    <span class="text-sm">Pedidos</span>
                </a>
            </li>
            <li class="mb-1 group">
                <a href="../../index.php" class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100 ">
                    <i class="ri-settings-2-line mr-3 text-lg"></i>
                    <span class="text-sm">Sair</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="fixed top-0 left-0 w-full h-full bg-black/50 z-40 md:hidden sidebar-overlay"></div>
    <main class="w-full md:w-[calc(100%-256px)] md:ml-64 bg-gray-50 min-h-screen transition-all main">
        <div class="py-2 px-6 bg-white flex items-center shadow-md shadow-black/5 sticky top-0 left-0 z-30">
            <button type="button" class="text-lg text-gray-600 sidebar-toggle">
                <i class="ri-menu-line"></i>
            </button>
            <ul class="flex items-center text-sm ml-4">
                <li class="mr-2">
                    <a href="#" class="text-gray-400 hover:text-gray-600 font-medium">Gerenciar</a>
                </li>
                <li class="text-gray-600 mr-2 font-medium">/</li>
                <li class="text-gray-600 mr-2 font-medium">Produtos</li>
            </ul>
            <div class="absolute right-5 flex items-center space-x-4">

                <div class="dropdown dropdown-end">
                    <label tabindex="0" class="btn btn-square btn-sm">
                        <i class="ri-search-line text-lg"></i>
                    </label>
                    <div tabindex="0" class="dropdown-content bg-white shadow-lg rounded-lg p-4 w-40">
                        Banana
                    </div>
                </div>


                <div class="dropdown dropdown-end">
                    <label tabindex="0" class="btn btn-square btn-sm">
                        <i class="ri-notification-line text-lg"></i>
                    </label>
                    <div tabindex="0" class="dropdown-content bg-white shadow-lg rounded-lg p-4 w-40">
                        Banana
                    </div>
                </div>
            </div>
        </div>

        <!-- adicionar -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 px-4 py-6">
            <a href="#"
                class="card shadow-xl hover:shadow-2xl transition-all duration-300 bg-white border border-gray-200 rounded-lg p-6 hover:bg-blue-50 hover:scale-105"
                onclick="document.getElementById('modal-adicionar-produto').classList.add('modal-open');">
                <div class="flex flex-col items-center">
                    <div class="icon bg-blue-100 text-blue-500 rounded-full p-4 mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-lg">Adicionar Produto</h3>
                    <p class="text-sm text-gray-500 mt-2 text-center">Clique aqui para adicionar produtos.</p>
                </div>
            </a>


            <div id="modal-adicionar-produto" class="modal">
                <div class="modal-box relative">
                    <label for="modal-adicionar-produto"
                        class="btn btn-sm btn-circle relative right-2 top-2"
                        onclick="document.getElementById('modal-adicionar-produto').classList.remove('modal-open');">✕</label>

                    <h3 class="font-bold text-lg mb-4">Adicionar Produto</h3>
                    <form action="" method="POST">
                        <div class="form-control mb-4">
                            <label class="label">
                                <span class="label-text">Nome do Produto</span>
                            </label>
                            <input type="text" name="nome" placeholder="Digite o nome do produto" class="input input-bordered" required />
                        </div>

                        <div class="form-control mb-4">
                            <label class="label">
                                <span class="label-text">Modelo do produto</span>
                            </label>
                            <input type="text" name="modelo" placeholder="Digite o modelo do produto" class="input input-bordered" required />
                        </div>

                        <div class="form-control mb-4">
                            <label class="label">
                                <span class="label-text">Marca do Produto</span>
                            </label>
                            <input type="text" name="marca" placeholder="Digite a marca do produto" class="input input-bordered" required />
                        </div>

                        <div class="form-control mb-4">
                            <label class="label">
                                <span class="label-text">categoria</span>
                            </label>
                            <select name="categoria" class="input input-bordered" required>
                                <option value="">Selecione o categoria</option>
                                <?php foreach ($categorias as $categoria): ?>
                                    <option value="<?= $categoria['id_categoria']; ?>"><?= $categoria['cat_nome']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>


                        <div class="form-control mb-4">
                            <label class="label">
                                <span class="label-text">Tamanho do Produto</span>
                            </label>
                            <select name="tamanho" class="input input-bordered" required>
                                <option value="">Selecione o tamanho</option>
                                <?php foreach ($tamanhos as $tamanho): ?>
                                    <option value="<?= $tamanho['id_tamanho']; ?>"><?= $tamanho['tam_tamanho']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-control mb-4">
                            <label class="label">
                                <span class="label-text">Material do Produto</span>
                            </label>
                            <select name="material" class="input input-bordered" required>
                                <option value="">Selecione o material</option>
                                <?php foreach ($materiais as $material): ?>
                                    <option value="<?= $material['id_material']; ?>"><?= $material['mat_nome']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-control mb-4">
                            <label class="label">
                                <span class="label-text">Cor do Produto</span>
                            </label>
                            <select name="cor" class="input input-bordered" required>
                                <option value="">Selecione o cor</option>
                                <?php foreach ($cores as $cor): ?>
                                    <option value="<?= $cor['id_cor']; ?>"><?= $cor['cor_nome']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-control mb-4">
                            <label class="label">
                                <span class="label-text">Preço</span>
                            </label>
                            <input type="number" name="preco" step="0.01" placeholder="Digite o preço" class="input input-bordered" required />
                        </div>
                        <div class="form-control mb-4">
                            <label class="label">
                                <span class="label-text">Imagem do Produto</span>
                            </label>
                            <input type="file" name="imagem" accept="image/*" class="input input-bordered" required />
                        </div>

                        <div class="form-control mt-6">
                            <button type="submit" name="adicionar_produto" class="btn btn-primary w-full">Adicionar</button>
                        </div>

                    </form>
                </div>
            </div>

            <?php

            if (isset($_POST['adicionar_produto'])) {
                $nome = $_POST['nome'];
                $modelo = $_POST['modelo'];
                $marca = $_POST['marca'];
                $categoria = $_POST['categoria'];
                $tamanho = $_POST['tamanho'];
                $material = $_POST['material'];
                $cor = $_POST['cor'];
                $preco = $_POST['preco'];
                $imagem = $_POST['imagem'];


                $stmt = $conexao->prepare("INSERT INTO tbl_produto (pro_nome, pro_modelo, pro_marca, pro_id_categoria, pro_id_tamanho, pro_id_material, pro_id_cor, pro_preco) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
                $stmt->execute([
                    $nome,
                    $modelo,
                    $marca,
                    $categoria,
                    $tamanho,
                    $material,
                    $cor,
                    $preco
                ]);
                $id_produto = $conexao->lastInsertId();

                if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
                    // Leitura e inserção da imagem
                    $imagem_temp = $_FILES['imagem']['tmp_name'];
                    $imagem_conteudo = file_get_contents($imagem_temp);

                    $stmt_imagem = $conexao->prepare("INSERT INTO tbl_detalhe_imagem (det_id_produto, det_imagem) VALUES (?, ?)");
                    $stmt_imagem->bindParam(1, $id_produto, PDO::PARAM_INT);
                    $stmt_imagem->bindParam(2, $imagem_conteudo, PDO::PARAM_LOB);
                    $stmt_imagem->execute();
                }
            }
            ?>


            <!-- editar -->
            <a href="#"
                class="card shadow-xl hover:shadow-2xl transition-all duration-300 bg-white border border-gray-200 rounded-lg p-6 hover:bg-yellow-50 hover:scale-105"
                onclick="document.getElementById('modal-editar-produto').classList.add('modal-open');">
                <div class="flex flex-col items-center">
                    <div class="icon bg-yellow-100 text-yellow-500 rounded-full p-4 mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 17l-4-4m0 0l4-4m-4 4h12" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-lg">Editar Produto</h3>
                    <p class="text-sm text-gray-500 mt-2 text-center">Clique aqui para editar produtos já cadastrados.</p>
                </div>
            </a>


            <div id="modal-editar-produto" class="modal">
                <div class="modal-box relative">
                    <label for="modal-editar-produto"
                        class="btn btn-sm btn-circle relative right-2 top-2"
                        onclick="document.getElementById('modal-editar-produto').classList.remove('modal-open');">✕</label>

                    <h3 class="font-bold text-lg mb-4">Editar Produto</h3>
                    <form action="" method="POST">
                        <div class="form-control mb-4">
                            <label class="label">
                                <span class="label-text">Nome do Produto</span>
                            </label>
                            <input type="text" name="nome" placeholder="Digite o nome do produto" class="input input-bordered" required />
                        </div>

                        <div class="form-control mb-4">
                            <label class="label">
                                <span class="label-text">Descrição</span>
                            </label>
                            <textarea name="descricao" placeholder="Digite a descrição" class="textarea textarea-bordered" required></textarea>
                        </div>

                        <div class="form-control mb-4">
                            <label class="label">
                                <span class="label-text">Preço</span>
                            </label>
                            <input type="number" name="preco" step="0.01" placeholder="Digite o preço" class="input input-bordered" required />
                        </div>
                        <div class="form-control mb-4">
                            <label class="label">
                                <span class="label-text">Quantidade</span>
                            </label>
                            <input type="number" name="quantidade" placeholder="Digite a quantidade" class="input input-bordered" required />
                        </div>

                        <div class="form-control mt-6">
                            <button type="submit" name="atualizar_produto" class="btn btn-primary w-full">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>

            <?php
            // Verificar se o formulário foi enviado
            if (isset($_POST['atualizar_produto'])) {
                // Coletando os dados do formulário
                $nome = $_POST['nome'];
                $descricao = $_POST['descricao'];
                $preco = $_POST['preco'];
                $quantidade = $_POST['quantidade'];

                // Conectar ao banco de dados
                $conexao = new PDO('mysql:host=localhost;dbname=seu_banco', 'usuario', 'senha');

                // Preparar a consulta para salvar os dados
                $stmt = $conexao->prepare("INSERT INTO tbl_produto (nome, descricao, preco, quantidade) VALUES (?, ?, ?, ?)");
                $stmt->execute([$nome, $descricao, $preco, $quantidade]);

                // Feedback após a inserção bem-sucedida (opcional)
                if ($stmt->rowCount()) {
                    echo '<script>alert("Produto salvo com sucesso!");</script>';
                } else {
                    echo '<script>alert("Erro ao salvar o produto!");</script>';
                }
            }
            ?>


            <!-- remover -->
            <a href="#"
                class="ard shadow-xl hover:shadow-2xl transition-all duration-300 hover:scale-105 bg-white border border-gray-200 rounded-lg p-6 hover:bg-red-50 hover-scale-105"
                onclick="document.getElementById('modal-remover-produto').classList.add('modal-open');">
                <div class="flex flex-col items-center">
                    <div class="icon bg-red-100 text-red-500 rounded-full p-4 mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </div>
                    <h3 class="font-bold text-lg">remover Produto</h3>
                    <p class="text-sm text-gray-500 mt-2 text-center">Clique aqui para remover produtos já cadastrados.</p>
                </div>
            </a>


            <div id="modal-remover-produto" class="modal">
                <div class="modal-box relative">
                    <label for="modal-remover-produto"
                        class="btn btn-sm btn-circle relative right-2 top-2"
                        onclick="document.getElementById('modal-remover-produto').classList.remove('modal-open');">✕</label>

                    <h3 class="font-bold text-lg mb-4">remover Produto</h3>
                    <form action="" method="POST">
                        <div class="form-control mb-4">
                            <label class="label">
                                <span class="label-text">produtos do Produto</span>
                            </label>
                            <select name="produtos" class="input input-bordered" required>
                                <option value="">Selecione o produtos</option>
                                <?php foreach ($produtos as $produto): ?>
                                    <option value="<?= $produto['id_produto']; ?>"><?= $produto['pro_nome']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-control mt-6">
                            <button type="submit" name="apagar_produto" class="btn btn-error w-full">apagar</button>
                        </div>
                    </form>
                    <?php
                    if (isset($_POST['apagar_produto'])) {
                        $stmt_apagar = $conexao->prepare("DELETE FROM tbl_produto WHERE id_produto = ?");
                        $stmt_apagar->execute([$produto['id_produto']]);
                    }
                    ?>
                </div>
            </div>
        </div>

    </main>



    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="../../js/gerente.js"></script>
</body>

</html>