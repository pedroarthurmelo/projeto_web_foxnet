function cadastrarUsuario() {
    // Obter os dados do formulário
    const formData = new FormData(document.getElementById('cadastroForm'));

    // Converte os dados do formulário para um objeto
    const data = {};
    formData.forEach((value, key) => {
        data[key] = value;
    });

    // Enviar os dados para a API usando fetch
    fetch('api_cadastro.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(data)
    })
    .then(response => response.json())
    .then(result => {
        // Exibe uma mensagem de sucesso ou erro
        alert(result.sucesso || result.erro);
    })
    .catch(error => console.error('Erro ao cadastrar:', error));
}
