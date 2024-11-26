// /js/script.js
document.addEventListener("DOMContentLoaded", function() {
    const form = document.querySelector("form");

    form.addEventListener("submit", function(event) {
        // Exemplo de validação de formulário
        if (!form['pet-photo'].value || !form['description'].value) {
            alert("Por favor, preencha todos os campos.");
            event.preventDefault(); // Evita o envio do formulário
        }
    });
});
