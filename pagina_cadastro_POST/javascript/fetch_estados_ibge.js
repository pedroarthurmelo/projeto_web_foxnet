document.addEventListener("DOMContentLoaded", function () {
    console.log("Script carregado");

    const estadoSelect = document.getElementById("estado");

    // Fazendo a requisição para a API do IBGE
    fetch("https://servicodados.ibge.gov.br/api/v1/localidades/estados")
        .then(response => response.json())
        .then(estados => {
            console.log(estados); // Verificação dos dados recebidos
            estados.sort((a, b) => a.nome.localeCompare(b.nome)); // Ordena os estados por nome
            estados.forEach(estado => {
                const option = document.createElement("option");
                option.value = estado.sigla;
                option.textContent = `${estado.nome} (${estado.sigla})`;
                estadoSelect.appendChild(option);
            });
            console.log("Estados carregados"); // Confirmação de que as opções foram adicionadas
        })
        .catch(error => console.error("Erro ao carregar os estados:", error));
});
