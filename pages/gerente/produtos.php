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
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 px-4 py-6">
            <a href="adicionar-produto.php" class="card shadow-xl hover:shadow-2xl transition-shadow bg-white border border-gray-200 rounded-lg p-6 hover:bg-blue-50">
                <div class="flex flex-col items-center">
                    <div class="icon bg-blue-100 text-blue-500 rounded-full p-4 mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-lg">Adicionar Produto</h3>
                    <p class="text-sm text-gray-500 mt-2 text-center">Clique aqui para adicionar novos produtos ao sistema.</p>
                </div>
            </a>

            <a href="editar-produto.php" class="card shadow-xl hover:shadow-2xl transition-shadow bg-white border border-gray-200 rounded-lg p-6 hover:bg-yellow-50">
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

            <a href="apagar-produto.php" class="card shadow-xl hover:shadow-2xl transition-shadow bg-white border border-gray-200 rounded-lg p-6 hover:bg-red-50">
                <div class="flex flex-col items-center">
                    <div class="icon bg-red-100 text-red-500 rounded-full p-4 mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-lg">Apagar Produto</h3>
                    <p class="text-sm text-gray-500 mt-2 text-center">Clique aqui para apagar produtos do sistema.</p>
                </div>
            </a>
        </div>

    </main>



    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="../../js/gerente.js"></script>
</body>

</html>