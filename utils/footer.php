<?php 
$base_url = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");
$base_url .= "://" . $_SERVER['HTTP_HOST'];
$base_url .= "/ProjetoSELL";  




$clienteLogado = isset($_SESSION['idcliente']);
?>



    <footer class="footer bg-base-200 text-base-900 p-10 border-t-2 mt-6 transition-all duration-300">
        <aside>
            <img src="<?= $base_url ?>/img/iconJGM.png" alt="" width="50%">
            <p class="font-bold">
                Joyce Galvão Modas
                <br />
                sofrendo desde 2006
            </p>
        </aside>
        <nav>
            <h6 class="footer-title">Serviços</h6>
            <a class="link link-hover">1</a>
            <a class="link link-hover">2</a>
            <a class="link link-hover">3</a>
            <a class="link link-hover">4</a>
        </nav>
        <nav>
            <h6 class="footer-title">Loja</h6>
            <a class="link link-hover">Sobre nós</a>
            <a class="link link-hover">Contatos</a>
            <a class="link link-hover">1</a>
            <a class="link link-hover">2</a>
        </nav>
        <nav>
            <h6 class="footer-title">Legal</h6>
            <a class="link link-hover">Termos de Uso</a>
            <a class="link link-hover">Politica de Privacidade</a>
            <a class="link link-hover">Uso de Cookies</a>
        </nav>
    </footer>
    <script src="<?= $base_url ?>/js/darkmode.js"></script>