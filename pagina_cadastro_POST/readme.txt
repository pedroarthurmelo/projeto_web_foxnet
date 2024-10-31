Instruções para Configuração e Execução do Projeto

Como Rodar
Passo 1: Instalação de Pré-requisitos
    Instale o XAMPP
    Faça o download e a instalação do XAMPP para disponibilizar o ambiente de servidor necessário para o projeto. Certifique-se de que as opções MySQL e Apache estão incluídas.

    Instale o DBeaver
    Baixe e instale o DBeaver para facilitar a criação e manipulação do banco de dados MySQL do projeto.

Passo 2: Configuração do Projeto
    Configuração de Arquivos do Projeto
        Abra a pasta htdocs dentro do diretório de instalação do XAMPP.
        Descompacte a pasta imagens e ao terminar de descompacta-la, exclua o imagens.zip
        Copie a pasta css contida dentro do arquivo da pasta pagina_cadastro_POST para htdocs
        Copie a pasta imagens para htdocs
        Copie a pasta javascript contida dentro do arquivo da pasta pagina_cadastro_POST para htdocs
        Copie SOMENTE os arquivos no interior da pasta paginas_e_configs para htdocs

Passo 3: Inicialização dos Serviços
    Execute o XAMPP
        Abra o XAMPP e inicie os serviços MySQL e Apache Web Server. Esses serviços são necessários para que o projeto funcione corretamente.

Passo 4: Criação do Banco de Dados
    Configuração no DBeaver
        Abra o DBeaver e conecte-se ao servidor MySQL.
        Crie um novo banco de dados com o nome usuario_db usando as seguintes configurações de conexão:

        Nome do Database: usuario_db
        Host: localhost
        Usuário: root
        Senha: (em branco) -> **AVISO**: Para testes, NÃO coloque senha no banco!

Passo 5: Execução do Script SQL
    Rodando o Script SQL
        Dentro do DBeaver, selecione o banco de dados usuario_db que acabou de criar.
        Importe e execute o script SQL fornecido para criar a estrutura de tabelas para poder inserir os dados de cadastro no projeto.
        
Passo 6: Abrindo a Página no Navegador
    Abra o seu navegador e acesso o localhost do Xampp, em seguida acesse a cadastro.php
    
->Se todas as configurações, portas e passos foram feitos corretamentes é para a página ser gerada dinamicamente em seu navegador.
