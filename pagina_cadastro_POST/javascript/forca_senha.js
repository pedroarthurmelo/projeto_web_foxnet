document.addEventListener("DOMContentLoaded", function() {
    const passwordInput = document.getElementById("password");
    const strengthDisplay = document.getElementById("password-strength");

    passwordInput.addEventListener("input", function() {
        const strength = verificarForcaSenha(passwordInput.value);
        atualizarTextoDaForca(strength);
    });

    function verificarForcaSenha(senha) {
        let forca = 0;
        if (senha.length >= 8) forca++;
        if (/[A-Z]/.test(senha)) forca++;
        if (/[a-z]/.test(senha)) forca++;
        if (/\d/.test(senha)) forca++;
        if (/[^A-Za-z0-9]/.test(senha)) forca++;

        switch (forca) {
            case 0:
            case 1:
                return 'Muito Fraca';
            case 2:
                return 'Fraca';
            case 3:
                return 'Média';
            case 4:
                return 'Forte';
            case 5:
                return 'Muito Forte';
        }
    }

    function atualizarTextoDaForca(strength) {
        strengthDisplay.innerHTML = `Força da senha: <span class="${strength.toLowerCase().replace(' ', '-')}">${strength}</span>`;
    }
});
