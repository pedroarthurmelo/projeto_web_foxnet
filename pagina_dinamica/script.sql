CREATE DATABASE IF NOT EXISTS placas_video_db;

-- Usar o banco de dados
USE placas_video_db;

-- Criar a tabela apenas se não existir
CREATE TABLE IF NOT EXISTS placas_de_video (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    descricao TEXT NOT NULL,
    especificacoes TEXT NOT NULL,
    preco_original DECIMAL(10, 2) NOT NULL,
    preco_com_desconto DECIMAL(10, 2) NOT NULL,
    preco_cartao DECIMAL(10, 2) NOT NULL,
    desconto VARCHAR(255),
    imagem_principal VARCHAR(255) NOT NULL,
    miniaturas TEXT,
    modelo VARCHAR(255) NOT NULL,
    titulo_secao_1 VARCHAR(255),
    descricao_secao_1 TEXT,
    imagem_secao_1 VARCHAR(255),
    titulo_secao_2 VARCHAR(255),
    descricao_secao_2 TEXT,
    imagem_secao_2 VARCHAR(255),
    titulo_secao_3 VARCHAR(255),
    descricao_secao_3 TEXT,
    imagem_secao_3 VARCHAR(255),
    marca VARCHAR(50),
    gpu VARCHAR(50),
    tecnologia_lhr VARCHAR(3),
    tecnologia_ray_tracing VARCHAR(3),
    tecnologia_dlss VARCHAR(3),
    interface VARCHAR(50),
    cuda_cores INTEGER,
    core_clocks VARCHAR(50),
    velocidade_memoria VARCHAR(50),
    tamanho_memoria VARCHAR(50),
    barramento_memoria VARCHAR(50),
    saidas VARCHAR(100),
    suporte_hdcp VARCHAR(3),
    consumo_energia VARCHAR(50),
    conectores_alimentacao VARCHAR(50),
    fonte_recomendada VARCHAR(50),
    dimensoes VARCHAR(50),
    suporte_versao_directx VARCHAR(50),
    suporte_versao_opengl VARCHAR(50),
    quantidade_maxima_telas INTEGER,
    vr_pronto VARCHAR(3),
    tecnologia_g_sync VARCHAR(3),
    adaptativo_v_sync VARCHAR(3),
    resolucao_maxima_digital VARCHAR(50)
);

-- Inserir dados na tabela
INSERT INTO placas_de_video (
    nome, descricao, especificacoes, preco_original, preco_com_desconto, preco_cartao, desconto, imagem_principal, miniaturas, modelo,
    titulo_secao_1, descricao_secao_1, imagem_secao_1, titulo_secao_2, descricao_secao_2, imagem_secao_2, titulo_secao_3, descricao_secao_3, imagem_secao_3,
    marca, gpu, tecnologia_lhr, tecnologia_ray_tracing, tecnologia_dlss, interface, cuda_cores, core_clocks, velocidade_memoria, 
    tamanho_memoria, barramento_memoria, saidas, suporte_hdcp, consumo_energia, conectores_alimentacao, fonte_recomendada, 
    dimensoes, suporte_versao_directx, suporte_versao_opengl, quantidade_maxima_telas, vr_pronto, tecnologia_g_sync, adaptativo_v_sync, resolucao_maxima_digital
) VALUES (
    'MSI NVIDIA GeForce RTX 3060 VENTUS 2X', 
    'Esta placa de vídeo oferece desempenho superior para os jogos mais recentes, com qualidade de imagem incrível e suporte a tecnologias avançadas. VENTUS traz um design focado no desempenho que mantém o essencial para realizar qualquer tarefa em mãos. Incluindo um arranjo de ventilador duplo confiável colocado em um design industrial rígido.', 
    'Memória 12GB GDDR6,Interface 192-bit,Conectores HDMI DisplayPort,Tecnologias DLSS Ray Tracing,Garantia 12 meses', 
    3229.99, 1847.98, 2174.00,  
    'ou em 1x com 10% de desconto ou em até 3x com 5% de desconto', 
    '../imagens/cards_home_lancamentos/placa_video/msi_rtx_3060.jpg', 
    '../imagens/cards_home_lancamentos/placa_video/msi_rtx_3060.jpg,../imagens/cards_home_lancamentos/placa_video/3060_img2.jpg,../imagens/cards_home_lancamentos/placa_video/3060_img3.jpg,../imagens/cards_home_lancamentos/placa_video/img4.jpg', 
    'MSI NVIDIA GeForce RTX 3060 VENTUS 2X',
    'PERFORMANCE DLSS', 
    'O DLSS aumenta a taxa de atualização de quadros e gera imagens mais bonitas e nítidas para os jogos. A tecnologia dá aos jogadores a opção de maximizar a performance, qualidade e a resolução final. Só o DLSS é capaz de manter a qualidade da imagem entre todas as resoluções nativas, mesmo a 1080p.',
    '../imagens/cards_home_lancamentos/placa_video/dlls.jpg',
    'RAY TRACING',  
    'O Ray Tracing é uma forma de renderização de gráficos 3D por computador, que até então não era aplicada aos games por limitações técnicas e, agora, é o grande diferencial das placas de vídeo de nova geração, que prometem oferecer imagens cada vez mais realistas e impressionantes.',
    '../imagens/cards_home_lancamentos/placa_video/ray_tracing.jpg',
    'ARQUITETURA AMPERE',  
    'A plataforma NVIDIA RTX revolucionou a computação visual profissional para sempre. A arquitetura NVIDIA Ampere aproveita o poder da RTX para melhorar significativamente o desempenho de cargas de trabalho de renderização, gráficos, AI e computação. Projetada com perfeição e apresentando inovações de última geração, a NVIDIA Ampere leva a RTX a novos patamares para as cargas de trabalho profissionais.',
     '../imagens/cards_home_lancamentos/placa_video/ampere.jpg',
    'MSI', 'NVIDIA GeForce RTX 3060', 'Sim', 'Sim', 'Sim', 'PCI Express Gen 4', 3584, 'Boost 1777 MHz', '15 Gbps', 
    '12GB GDDR6', '192-bit', '3x DisplayPort (v1.4a), 1x HDMI 2.1', 'Sim', '170W', '8 pinos', '550W', 
    '235 x 124 x 42 mm', '12 API', '4.6', 4, 'Sim', 'Sim', 'Sim', '7680 x 4320'
);

