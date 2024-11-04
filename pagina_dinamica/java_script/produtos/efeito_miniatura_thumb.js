// Função para mudar a imagem principal e adicionar classe ativa à miniatura
function changeImage(imageSrc, thumbnail) {
    const produtoPrincipal = document.getElementById("produto-principal");

    // Adiciona a classe 'fade-out' para iniciar o efeito de fade-out
    produtoPrincipal.classList.add('fade-out');

    // Espera um tempo antes de trocar a imagem
    setTimeout(() => {
        // Atualiza a imagem principal
        produtoPrincipal.src = imageSrc;

        // Remove a classe 'active-thumbnail' das miniaturas anteriores
        const thumbnails = document.querySelectorAll(".miniaturas img");
        thumbnails.forEach(img => img.classList.remove("active-thumbnail"));

        // Adiciona a classe 'active-thumbnail' à miniatura clicada
        thumbnail.classList.add("active-thumbnail");

        // Remove a classe 'fade-out' e adiciona 'fade-in' para iniciar o fade-in
        produtoPrincipal.classList.remove('fade-out');
        produtoPrincipal.classList.add('fade-in');

        // Remove a classe 'fade-in' após a transição para permitir um novo fade-out
        setTimeout(() => {
            produtoPrincipal.classList.remove('fade-in');
        }, 700); // Tempo deve corresponder à duração da transição (500ms)
    }, 700); // Tempo para aguardar o fade-out
}

// Função para alternar automaticamente a imagem
function autoChangeImage() {
    const miniaturas = document.querySelectorAll('.miniaturas img');
    let currentIndex = 0;

    return setInterval(() => {
        // Altera a imagem principal para a próxima miniatura
        currentIndex = (currentIndex + 1) % miniaturas.length; // Cicla entre as miniaturas
        const thumbnail = miniaturas[currentIndex];
        changeImage(thumbnail.src, thumbnail);
    }, 6000); // Altera a cada 6 segundos
}

// Configuração do evento de clique nas miniaturas
document.addEventListener("DOMContentLoaded", function() {
    const miniaturas = document.querySelectorAll('.miniaturas img');
    const produtoPrincipal = document.getElementById('produto-principal');

    miniaturas.forEach(miniatura => {
        miniatura.addEventListener('click', function() {
            changeImage(this.src, this); // Chama a função de mudança de imagem
            clearInterval(autoChange); // Para a mudança automática ao clicar
        });
    });

    // Inicia a troca automática de imagens
    const autoChange = autoChangeImage();
});
