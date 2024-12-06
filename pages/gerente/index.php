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
            <li class="mb-1 group active">
                <a href="index.php" class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100 transition-all duration-300">
                    <i class="ri-home-2-line mr-3 text-lg"></i>
                    <span class="text-sm">Visão Geral</span>
                </a>
            </li>
            <li class="mb-1 group">
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
    <!-- end: Sidebar -->

    <!-- start: Main -->
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
                <li class="text-gray-600 mr-2 font-medium">Visão Geral</li>
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
        <div class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
                <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
                    <div class="flex justify-between mb-6">
                        <div>
                            <div class="text-2xl font-semibold mb-1">10</div>
                            <div class="text-sm font-medium text-gray-400">Pedidos Pendentes</div>
                        </div>

                    </div>
                    <div class="flex items-center">
                        <div class="w-full bg-gray-100 rounded-full h-4">
                            <div class="h-full bg-blue-500 rounded-full p-1" style="width: 60%;">
                                <div class="w-2 h-2 rounded-full bg-white ml-auto"></div>
                            </div>
                        </div>
                        <span class="text-sm font-medium text-gray-600 ml-4">60%</span>
                    </div>
                </div>
                <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
                    <div class="flex justify-between mb-4">
                        <div>
                            <div class="flex items-center mb-1">
                                <div class="text-2xl font-semibold">324</div>
                            </div>
                            <div class="text-sm font-medium text-gray-400">Novos Clientes</div>
                        </div>

                    </div>
                    <div class="flex items-center">
                        <img src="https://placehold.co/32x32" alt="" class="w-8 h-8 rounded-full object-cover block">
                        <img src="https://placehold.co/32x32" alt="" class="w-8 h-8 rounded-full object-cover block -ml-3">
                        <img src="https://placehold.co/32x32" alt="" class="w-8 h-8 rounded-full object-cover block -ml-3">
                        <img src="https://placehold.co/32x32" alt="" class="w-8 h-8 rounded-full object-cover block -ml-3">
                        <img src="https://placehold.co/32x32" alt="" class="w-8 h-8 rounded-full object-cover block -ml-3">
                    </div>
                </div>
                <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
                    <div class="flex justify-between mb-6">
                        <div>
                            <div class="text-2xl font-semibold mb-1"><span class="text-base font-normal text-gray-400 align-top">R$</span>2,345</div>
                            <div class="text-sm font-medium text-gray-400">Lucro Liquido</div>
                        </div>
                    </div>
                    <a href="#" class="text-blue-500 font-medium text-sm hover:text-blue-600">Ver detalhes</a>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
                <div class="bg-white border border-gray-100 shadow-md shadow-black/5 p-6 rounded-md lg:col-span-2">
                    <div class="flex justify-between mb-4 items-start">
                        <div class="font-medium">Estatisticas de Venda</div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mb-4">
                        <div class="rounded-md border border-dashed border-gray-200 p-4">
                            <div class="flex items-center mb-0.5">
                                <div class="text-xl font-semibold">10</div>
                                <span class="p-1 rounded text-[12px] font-semibold bg-blue-500/10 text-blue-500 leading-none ml-1">R$80</span>
                            </div>
                            <span class="text-gray-400 text-sm">Pendentes</span>
                        </div>
                        <div class="rounded-md border border-dashed border-gray-200 p-4">
                            <div class="flex items-center mb-0.5">
                                <div class="text-xl font-semibold">50</div>
                                <span class="p-1 rounded text-[12px] font-semibold bg-emerald-500/10 text-emerald-500 leading-none ml-1">+R$469</span>
                            </div>
                            <span class="text-gray-400 text-sm">Finalizados</span>
                        </div>
                        <div class="rounded-md border border-dashed border-gray-200 p-4">
                            <div class="flex items-center mb-0.5">
                                <div class="text-xl font-semibold">4</div>
                                <span class="p-1 rounded text-[12px] font-semibold bg-rose-500/10 text-rose-500 leading-none ml-1">-R$130</span>
                            </div>
                            <span class="text-gray-400 text-sm">Cancelados</span>
                        </div>
                    </div>
                    <div>
                        <canvas id="order-chart"></canvas>
                    </div>
                </div>

            </div>
        </div>
    </main>

    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="../../js/gerente.js"></script>
</body>

</html>