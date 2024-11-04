<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro FoxNet</title>
    <link rel="stylesheet" href="../css/cadastro.css">
    <!--Fonte-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Agdasima:wght@400;700&display=swap" rel="stylesheet">
    <!--Simbolo Whatsapp-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <!-- Cabeçalho -->
    <header>
        <div class="logo-container">
            <a href="../html/index.html">
                <img src="../imagens/logo/fox1_resize3.png" alt="Logo da Loja" class="logo-img">
            </a>
            <span class="logo-text" style="font-size: 42px;">FoxNet</span>
        </div>
        <nav>
            <ul>
                <li class="agdasima-regular">
                    <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="3" y1="12" x2="21" y2="12"></line>
                            <line x1="3" y1="6" x2="21" y2="6"></line>
                            <line x1="3" y1="18" x2="21" y2="18"></line>
                        </svg>
                        DEPARTAMENTOS
                    </a>
                    <ul class="dropdown">
                        <li><a href="#">Hardware</a></li>
                        <li><a href="#">Processador</a></li>
                        <li><a href="#">Gabinete</a></li>
                        <li><a href="#">Memória RAM</a></li>
                        <li><a href="#">HD e SSD</a></li>
                        <li><a href="#">Placa Mãe</a></li>
                        <li><a href="#">Placa de Vídeo</a></li>
                        <li><a href="#">Coolers</a></li>
                        <li><a href="#">Fontes</a></li>
                        <li><a href="#">Monitor</a></li>
                        <li><a href="#">Periféricos</a></li>
                        <!-- Adicione mais itens conforme necessário -->
                    </ul>
                </li>
                <li class="agdasima-regular"><a class="color-change" href="#">PROMOÇÕES</a></li>
                <li class="agdasima-regular"><a class="color-change" href="#">HARDWARE</a></li>
                <li class="agdasima-regular"><a class="color-change" href="#">NOTEBOOKS</a></li>
                <li class="agdasima-regular"><a class="color-change" href="#">ATENDIMENTO</a></li>
            </ul>
        </nav>
        <div class="search-login">
            <input type="text" class="agdasima-regular" placeholder="Pesquise seu produto">
            <a href="#" class="agdasima-regular">Login/Cadastro</a>
            <a href="#" class="cart agdasima-regular">Carrinho</a>
        </div>
    </header>
    
    <body>
    <!-- Box para Cadastro -->
    <div class="container">
        <div class="contact-form">
            <h2 class="agdasima-regular container-cadastro" style="color: aliceblue;">CADASTRO</h2>
            <h2 class="agdasima-regular">Usuário</h2>
            <!-- Removemos o atributo action e method porque vamos usar JavaScript -->
            <form id="cadastroForm">
                <div class="input-group">
                    <input type="text" class="agdasima-regular" name="first-name" placeholder="Primeiro Nome" required>
                    <input type="text" class="agdasima-regular" name="last-name" placeholder="Último Nome" required>
                </div>

                <input type="email" class="agdasima-regular" name="email" placeholder="Email para Contato" required>
                <input type="text" class="agdasima-regular" name="telefone" placeholder="Telefone com DDD" required>
                <input type="text" class="agdasima-regular" name="cpf" placeholder="CPF" required>
                <h2 class="agdasima-regular" style="font-size: 22px;">Data de Nascimento</h2>
                <input type="date" class="agdasima-regular" name="date-nascimento" required>

                <h2 class="agdasima-regular" style="font-size: 22px;">Endereço</h2>
                <div class="input-group dropdown">
                    <label for="assunto" class="agdasima-regular" required></label>
                    <select id="estado" name="estado" class="agdasima-regular">
                        <option value="" disabled selected>Escolha um Estado</option>
                    </select>
                </div>

                <input type="text" class="agdasima-regular" name="cidade" placeholder="Cidade" required>
                <div class="input-group">
                    <input type="text" class="agdasima-regular" name="rua" placeholder="Rua" required>
                    <input type="text" class="agdasima-regular" name="numero" placeholder="Número" required>
                </div>

                <input type="text" class="agdasima-regular" name="cep" placeholder="CEP" required>

                <h2 class="agdasima-regular" style="font-size: 22pz;">Senha</h2>
                <input type="password" class="agdasima-regular" id="password" name="password" placeholder="Senha" required>
                <div id="password-strength" class="agdasima-regular" style="font-size: 18px;">Força da senha:</div>
                <input type="password" class="agdasima-regular" name="confirmacao_senha" placeholder="Confirme sua Senha" required>

                <button type="button" class="agdasima-regular" onclick="cadastrarUsuario()">ENVIAR</button>
            </form>
        </div>
    </div>

    <!--Consumindo os Estados direto do IBGE para o Formulário-->
    <script src="../java_script/cadastro/fetch_estados_ibge.js"></script>

    <!--Força Senha-->
    <script src="../java_script/cadastro/forca_senha.js"></script>

    <!--Cadastro POST JS-->
    <script src="../java_script/cadastro/post.js"></script>


    <!--Roda-Pé-->
    <footer class="footer">
        <div class="footer-container">
            <!-- Formas de Pagamento -->
            <div class="footer-section">
                <h3 class="agdasima-regular">FORMAS DE PAGAMENTO</h3>
                <img src="../imagens/formas_de_pagamento/pix.png" alt="formas_de_pagamento">
                <img src="../imagens/formas_de_pagamento/boleto-logo.png" alt="formas_de_pagamento">
                <img src="../imagens/formas_de_pagamento/cartao.png" alt="formas_de_pagamento">
                <!-- Adicione mais ícones conforme necessário -->
            </div>
            <!-- Segurança -->
            <div class="footer-section">
                <h3 class="agdasima-regular">SEGURANÇA</h3>
                <a href="https://safebrowsing.google.com/" target="_blank" rel="noopener noreferrer">
                    <img src="../imagens/imagens_rodape/SafeBrowsing_Icon.png" alt="SafeBrowsing" class="imagem-destacada">
                </a>
                <!-- Adicione mais ícones conforme necessário -->
            </div>
            <!-- Institucional -->
            <div class="footer-section">
                <h3 class="agdasima-regular">INSTITUCIONAL</h3>
                <a class="agdasima-regular" href="./quem_somos.html">Quem somos</a>
                <a class="agdasima-regular" href="#">Termos e Condições de Venda</a>
                <a class="agdasima-regular" href="#">Política de Troca e Devoluções</a>
                <!-- Adicione mais links conforme necessário -->
            </div>
            <!-- Dúvidas -->
            <div class="footer-section">
                <h3 class="agdasima-regular">DÚVIDAS</h3>
                <a class="agdasima-regular" href="#">Como comprar</a>
                <a class="agdasima-regular" href="#">Prazos e entregas</a>
                <a class="agdasima-regular" href="#">Formas de Pagamento</a>
                <!-- Adicione mais links conforme necessário -->
            </div>
            <!-- Cliente -->
            <div class="footer-section">
                <h3 class="agdasima-regular">CLIENTE</h3>
                <a class="agdasima-regular" href="#">Minha conta</a>
                <a class="agdasima-regular" href="#">Meus pedidos</a>
                <a class="agdasima-regular" href="#">Meus cupons</a>
            </div>
            <!-- Ajuda -->
            <div class="footer-section">
                <h3 class="agdasima-regular">AJUDA</h3>
                <a href="../html/fale_conosco.html" class="agdasima-regular">Fale Conosco</a>
            </div>
            <!-- Redes Sociais -->
            <div class="footer-section">
                <h3 class="agdasima-regular">SIGA-NOS</h3>
                <a href="https://www.instagram.com/" target="_blank" rel="noopener noreferrer">
                    <img src="../imagens/imagens_rodape/instagram.png" alt="SafeBrowsing" class="imagem-destacada">
                </a>
                <a href="https://discord.com/" target="_blank" rel="noopener noreferrer">
                    <img src="../imagens/imagens_rodape/discord.png" alt="SafeBrowsing" class="imagem-destacada">
                </a>
            </div>
        </div>
    </footer>    
</body>

</html>