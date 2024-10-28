function toggleTexto(id) {
    const element = document.getElementById(id);
    if (element.style.display === "none") {
        element.style.display = "block"; // Mostra o conteúdo
    } else {
        element.style.display = "none"; // Esconde o conteúdo
    }
}
