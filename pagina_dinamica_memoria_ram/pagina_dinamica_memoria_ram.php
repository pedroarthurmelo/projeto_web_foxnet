<?php
include 'config_ram.php'; // Arquivo de configuração com a conexão ao banco

// ID do produto passado por query string (?id=1)
$id = isset($_GET['id']) ? $_GET['id'] : 1;

// Consulta SQL para obter os dados do produto
$stmt = $conn->prepare("SELECT * FROM memoria_ram WHERE id = :id");
$stmt->execute(['id' => $id]);
$produto = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$produto) {
    echo "Produto não encontrado.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $produto['nome']; ?> FoxNet</title>
    <link rel="stylesheet" href="../css/produtos_dinamica.css">
    <!-- Fonte e Icones -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Agdasima:wght@400;700&display=swap" rel="stylesheet">
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
    
    <!-- Produto -->
    <div class="produto-container">
        <div class="imagens-produto">
            <img id="produto-principal" src="<?php echo $produto['imagem_principal']; ?>" alt="Imagem do Produto">
            <div class="miniaturas">
                <!-- Gerando miniaturas dinamicamente -->
                <?php foreach (explode(',', $produto['miniaturas']) as $miniatura): ?>
                    <img src="<?php echo $miniatura; ?>" alt="Thumbnail" onclick="changeImage('<?php echo $miniatura; ?>', this)">
                <?php endforeach; ?>
            </div>
        </div>
        
        <div class="detalhes-produto informacoes-preco">
            <div class="descricao-produto">
                <h2 class="agdasima-regular" style="text-align: center; font-size: 35px; color: #F94318;"><?php echo $produto['nome']; ?></h2>
                <p class="agdasima-regular" style="color: #fff;"><?php echo $produto['descricao']; ?></p>
            </div>
            <div class="especificacoes-produto informacoes-preco2 specs-content2 agdasima-regular">
                <h2 class="agdasima-regular" style="font-size: 30px; color: #F94318;">Especificações</h2>
                <div class="specs-content">
                    <ul>
                        <?php foreach (explode(',', $produto['especificacoes']) as $especificacao): ?>
                            <li style="color: #fff"><?php echo $especificacao; ?></li>
                        <?php endforeach; ?>
                    </ul>
                    <div class="specs-image">
                        <img src="../imagens/formas_de_pagamento/gear-removebg-preview.png" alt="boleto">
                    </div>
                </div>
            </div>
            <div class="informacoes-preco agdasima-regular" style="font-size: 30px; color: #fff;">
            	<img src="../imagens/formas_de_pagamento/bol_resized.png" alt="boleto">
                <p class="preco-original agdasima-regular">De: R$ <?php echo number_format($produto['preco_original'], 2, ',', '.'); ?></p>
                <p class="preco-com-desconto agdasima-regular" style="color: #00970F;">Por: R$ <?php echo number_format($produto['preco_com_desconto'], 2, ',', '.'); ?> <span class="desconto">(15% de desconto à vista no Boleto ou Pix)</span></p>
                <img src="../imagens/formas_de_pagamento/fpr_mercadopago.png" alt="cartao">
                <p class="preco-com-desconto agdasima-regular" style="color: #F94318;">Cartão: R$ <?php echo number_format($produto['preco_cartao'], 2, ',', '.'); ?></p>
                <h2 class="agdasima-regular">Parcelamento : <select id="parcelamento-dropdown"></select></h2> 
                <p class="preco-parcelado agdasima-regular">ou em 1x com 10% de desconto ou em até 3x com 5% de desconto</p>
            </div>
            <button class="botao-compra agdasima-regular" style="font-size: 25px;">Adicionar ao Carrinho</button>
        </div>
    </div>

    <!-- Mais Informações -->
    <div class="container">
	    <div class="botao-container">
		<button class="botao-toggle agdasima-regular" onclick="toggleTexto('informacao')">Mais Informações</button>
	    </div>
	    <div id="informacao" class="especificacoes-tecnicas tabela-container-info agdasima-regular" style="display: none;">

		<!-- Seção1 -->
		<section class="mission">
		    <div class="content">
		        <h1 class="agdasima-regular" style="font-size: 40px; color: black;"><?php echo htmlspecialchars($produto['titulo_secao_1']); ?></h1>
		        <p class="agdasima-regular"><?php echo htmlspecialchars($produto['descricao_secao_1']); ?></p>
		    </div>
		    <div class="image-container">
		        <img src="<?php echo htmlspecialchars($produto['imagem_secao_1']); ?>" alt="Imagem de Performance DLSS">
		    </div>
		</section>
		
		<!-- Seção2 -->
		<section class="story">
		    <div class="story-content content">
		      <h1 class="agdasima-regular" style="font-size: 40px; color: black;"><?php echo htmlspecialchars($produto['titulo_secao_2']); ?></h1>
		      <p class="agdasima-regular"><?php echo htmlspecialchars($produto['descricao_secao_2']); ?></p>
		    </div>
		    <div class="video-container">
		      <img src="<?php echo htmlspecialchars($produto['imagem_secao_2']); ?>" alt="Imagem de Ray Tracing">
		    </div>
		</section>
		
		<!-- Seção3 -->
		<section class="mission">
		    <div class="content">
		        <h1 class="agdasima-regular" style="font-size: 40px; color: black;"><?php echo htmlspecialchars($produto['titulo_secao_3']); ?></h1>
		        <p class="agdasima-regular"><?php echo htmlspecialchars($produto['descricao_secao_3']); ?></p>
		    </div>
		    <div class="image-container">
		        <img src="<?php echo htmlspecialchars($produto['imagem_secao_3']); ?>" alt="Imagem de Arquitetura Ampere">
		    </div>
		</section>
	    </div>
	</div>

    <!-- Especificação Técnica -->
    <div class="container">
    <div class="botao-container">
        <button class="botao-toggle agdasima-regular" onclick="toggleTexto('especificacoes-tecnicas')">Especificação Técnica Completa</button>
    </div>
    <div id="especificacoes-tecnicas" class="especificacoes-tecnicas tabela-container agdasima-regular" style="display: none;">
        <table>
        <?php if ($produto): ?>
                <tr><th>Marca:</th><td><?= htmlspecialchars($produto['marca']); ?></td></tr>
                <tr><th>Modelo:</th><td><?= htmlspecialchars($produto['modelo']); ?></td></tr>
                <tr><th>Capacidade:</th><td><?= htmlspecialchars($produto['capacidade']); ?></td></tr>
                <tr><th>Frequência:</th><td><?= htmlspecialchars($produto['frequencia']); ?></td></tr>
                <tr><th>Perfil de Memória:</th><td><?= htmlspecialchars($produto['perfil_de_memoria']); ?></td></tr>
                <tr><th>Latência:</th><td><?= htmlspecialchars($produto['latencia']); ?></td></tr>
                <tr><th>Tensão:</th><td><?= htmlspecialchars($produto['tensao']); ?></td></tr>
                <tr><th>Temperatura de Operação:</th><td><?= htmlspecialchars($produto['temperatura_operacao']); ?></td></tr>
                <tr><th>Cor:</th><td><?= htmlspecialchars($produto['cor']); ?></td></tr>
            <?php else: ?>
                <tr><td colspan="2">Especificações não disponíveis.</td></tr>
            <?php endif; ?>
        </table>
    </div>
</div>


    <!-- Scripts -->
    <script src="../java_script/produtos/efeito_miniatura_thumb.js"></script>
    <script src="../java_script/produtos/calculo_parcelas.js"></script>
    <script src="../java_script/produtos/texto_escondido.js"></script>
    
        <div id="product-carousel-2" class="product-carousel-2-container">
        <div class="product-carousel-2-wrapper">
            <div class="product-carousel-2-slide">
    
                <!-- Card 1 -->
                <div class="product-card-carousel2 neon-card">
                    <div class="product-header agdasima-regular">SSD Kingston A400</div>
                    <img src="../imagens/carrosel_final_pagina/kingstonssd.jpg" alt="SSD2" >
                    <div class="product-price2">
                        <h3 class="agdasima-regular">240GB | Sata III | Leitura 500MBs | Gravação 350MBs</h3>
                        <span class="old-price agdasima-regular">R$ 309,99</span>
                        <span class="discount agdasima-regular">15% OFF</span>
                        <span class="new-price agdasima-regular">R$ 169,90 à vista</span>
                        <span class="installments agdasima-regular">ou 12x de R$ 22,21 sem juros</span>
                    </div>
                    <span class="neon-border2"></span>
                </div>
    
                <!-- Card 2 -->
                <div class="product-card-carousel2 neon-card">
                    <div class="product-header agdasima-regular">AMD Radeon RX 580 2048SP</div>
                    <img src="../imagens/carrosel_final_pagina/rx580.jpg" alt="rx580">
                    <div class="product-price2">
                        <h3 class="agdasima-regular">8GB | GDDR5 | 256 Bit | VA5815RQ82</h3>
                        <span class="old-price agdasima-regular">R$ 1299,90</span>
                        <span class="discount agdasima-regular">15% OFF</span>
                        <span class="new-price agdasima-regular">R$ 799,90 à vista</span>
                        <span class="installments agdasima-regular">ou 12x de R$ 78,42 sem juros</span>
                    </div>
                    <span class="neon-border2"></span>
                </div>
    
                <!-- Card 3 -->
                <div class="product-card-carousel2 neon-card">
                    <div class="product-header agdasima-regular">Gigabyte GP-UD750GM PG5</div>
                    <img src="../imagens/carrosel_final_pagina/fontegigabyte.jpg" alt="fonte">
                    <div class="product-price2">
                        <h3 class="agdasima-regular">750W | 80 Plus Gold | PCIE 5.0 | 
                            PFC Ativo | Full Modular | GP-UD750GM PG5</h3>
                        <span class="old-price agdasima-regular">R$ 1199,99</span>
                        <span class="discount agdasima-regular">15% OFF</span>
                        <span class="new-price agdasima-regular">R$ 769,90 à vista</span>
                        <span class="installments agdasima-regular">ou 12x de R$ 75,48 sem juros</span>
                    </div>
                    <span class="neon-border2"></span>
                </div>
    
                <!-- Card 4 -->
                <div class="product-card-carousel2 neon-card">
                    <div class="product-header agdasima-regular">Redragon Cobra V2</div>
                    <img src="../imagens/carrosel_final_pagina/redragonmouse.jpg" alt="Mouse">
                    <div class="product-price2">
                        <h3 class="agdasima-regular">RGB | 12400 DPI | 8 Botões Programáveis |
                             Black | M711 V2</h3>
                        <span class="old-price agdasima-regular">R$ 199,90</span>
                        <span class="discount agdasima-regular">15% OFF</span>
                        <span class="new-price agdasima-regular">R$ 99,90 à vista</span>
                        <span class="installments agdasima-regular">ou 12x de R$ 23,51 sem juros</span>
                    </div>
                    <span class="neon-border2"></span>
                </div>
    
                <!-- Card 5 -->
                <div class="product-card-carousel2 neon-card">
                    <div class="product-header agdasima-regular">DDR4 Redragon Rage</div>
                    <img src="../imagens/carrosel_final_pagina/ramredragon.png" alt="ramredragon">
                    <div class="product-price2">
                        <h3 class="agdasima-regular">8GB | 3200Mhz | Red | GM-701</h3>
                        <span class="old-price agdasima-regular">R$ 265,90</span>
                        <span class="discount agdasima-regular">15% OFF</span>
                        <span class="new-price agdasima-regular">R$ 176,35 à vista</span>
                        <span class="installments agdasima-regular">ou 8x de R$ 22,04 sem juros</span>
                    </div>
                    <span class="neon-border2"></span>
                </div>
    
                <!-- Card 6 -->
                <div class="product-card-carousel2 neon-card">
                    <div class="product-header agdasima-regular">Redragon Magic Wand</div>
                    <img src="../imagens/carrosel_final_pagina/tecladored.png" alt="tecladored">
                    <div class="product-price2">
                        <h3 class="agdasima-regular">RGB | Switch Brown | ABNT2 |
                             Branco Preto e Vermelho | Mecânico</h3>
                        <span class="old-price agdasima-regular">R$ 439,90</span>
                        <span class="discount agdasima-regular">15% OFF</span>
                        <span class="new-price agdasima-regular">R$ 269,90 à vista</span>
                        <span class="installments agdasima-regular">ou 12x de R$ 26,46 sem juros</span>
                    </div>
                    <span class="neon-border2"></span>
                </div>
    
                <!-- Card 7 -->
                <div class="product-card-carousel2 neon-card">
                    <div class="product-header agdasima-regular">Headset Havit H200D</div>
                    <img src="../imagens/carrosel_final_pagina/havit.jpg" alt="fonehavit">
                    <div class="product-price2">
                        <h3 class="agdasima-regular">3.5mm | Drivers de 53mm | Múltiplas Plataformas |
                             Black/Green | HVGMH-H2002D-BN</h3>
                        <span class="old-price agdasima-regular">R$ 299,90</span>
                        <span class="discount agdasima-regular">15% OFF</span>
                        <span class="new-price agdasima-regular">R$ 189,90 à vista</span>
                        <span class="installments agdasima-regular">ou 11x de R$ 23,31 sem juros</span>
                    </div>
                    <span class="neon-border2"></span>
                </div>
    
                <!-- Card 8 -->
                <div class="product-card-carousel2 neon-card">
                    <div class="product-header agdasima-regular">Asus TUF Gaming B450-Plus II</div>
                    <img src="../imagens/carrosel_final_pagina/placamaeasus.png" alt="PlacaMaeAsus">
                    <div class="product-price2">
                        <h3 class="agdasima-regular">Chipset B450 | AMD AM4 | 
                            ATX | DDR4 | 90MB1650-M0EAY0</h3>
                        <span class="old-price agdasima-regular">R$ 1799,99</span>
                        <span class="discount agdasima-regular">15% OFF</span>
                        <span class="new-price agdasima-regular">R$ 699,90 à vista</span>
                        <span class="installments agdasima-regular">ou 5x de R$ 68,62 sem juros</span>
                    </div>
                    <span class="neon-border2"></span>
                </div>
    
                <!-- Card 9 -->
                <div class="product-card-carousel2 neon-card">
                    <div class="product-header agdasima-regular">ASRock Phantom Gaming PG34WQ15R3A</div>
                    <img src="../imagens/carrosel_final_pagina/monitorgamer.jpg" alt="MonitorGamer">
                    <div class="product-price2">
                        <h3 class="agdasima-regular">34 Pol | Curvo | WQuadHD | 1ms | 165Hz |
                             115% sRGB | VA | HDR | FreeSync | HDMI/DP</h3>
                        <span class="old-price agdasima-regular">R$ 4699,99</span>
                        <span class="discount agdasima-regular">15% OFF</span>
                        <span class="new-price agdasima-regular">R$ 3499,90 à vista</span>
                        <span class="installments agdasima-regular">ou 12x de R$ 343,13 sem juros</span>
                    </div>
                    <span class="neon-border2"></span>
                </div>
    
            </div>
        </div>
    
        <button class="product-carousel-2-prev">&#10094;</button>
        <button class="product-carousel-2-next">&#10095;</button>
    </div>

    <!--Carrosel-->
    <script src="../java_script/produtos/carrosel.js"></script>
    
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
