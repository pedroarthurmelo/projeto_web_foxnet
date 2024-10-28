// Função para calcular o parcelamento
function calcularParcelas(precoAVista, precoCartao, maxParcelas) {
    const dropdown = document.getElementById("parcelamento-dropdown");
    const precoParcelado = document.querySelector(".preco-parcelado");
    dropdown.innerHTML = ""; // Limpa o dropdown antes de preencher

    // Usando o preço do cartão para o cálculo das parcelas
    const precoProduto = precoCartao;

    // Exibe o texto padrão com as novas regras de parcelamento
    precoParcelado.innerHTML = `ou em 1x com 10% de desconto<br>ou em até 3x com 5% de desconto`;

    // Adiciona as opções ao dropdown
    for (let i = 1; i <= maxParcelas; i++) {
        let valorParcela;
        let desconto = 0;

        // Defina as regras de desconto e cálculo
        if (i === 1) {
            desconto = 10; // 10% de desconto para 1x
            valorParcela = precoAVista * (1 - desconto / 100);
        } else if (i <= 3) {
            desconto = 5; // 5% de desconto para 2x e 3x
            valorParcela = precoProduto / i * (1 - desconto / 100);
        } else {
            valorParcela = precoProduto / i; // s/juros
        }

        // Formatação do valor da parcela
        valorParcela = valorParcela.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' });
        
        // Adiciona a opção ao dropdown
        const option = document.createElement("option");
        option.value = i; // O valor pode ser o número de parcelas
        option.textContent = `${i}x de ${valorParcela} ${desconto > 0 ? `c/desconto de ${desconto}%*` : 's/juros*'}`;
        dropdown.appendChild(option);
    }
}


// Ao carregar a página, pegue o valor do produto e calcule as parcelas
document.addEventListener("DOMContentLoaded", function() {
    const precoAVistaTexto = document.querySelector(".preco-com-desconto").textContent;
    const precoAVista = parseFloat(precoAVistaTexto.replace(/[^0-9,]/g, '').replace(',', '.')); // Preço à vista

    const precoCartaoTexto = document.querySelector(".preco-com-desconto[style*='color: #F94318;']").textContent;
    const precoCartao = parseFloat(precoCartaoTexto.replace(/[^0-9,]/g, '').replace(',', '.')); // Preço no cartão

    // Chama a função para calcular as parcelas, por exemplo, até 12x
    calcularParcelas(precoAVista, precoCartao, 12);

    // Atualiza o preço parcelado ao mudar a seleção do dropdown
    const dropdown = document.getElementById("parcelamento-dropdown");
    dropdown.addEventListener("change", function() {
        const parcelasSelecionadas = parseInt(this.value);
        atualizarPrecoParcelado(precoCartao, parcelasSelecionadas);
    });
});
