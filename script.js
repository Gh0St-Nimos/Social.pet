
// Referências ao Modal e elementos
const modal = document.getElementById('imageModal');
const modalImg = document.getElementById('modalImage');
const closeBtn = document.getElementsByClassName('close')[0];

// Função para abrir o Modal ao clicar na imagem
document.querySelectorAll('.post-picture').forEach(image => {
    image.addEventListener('click', function () {
        modal.style.display = 'block';
        modalImg.src = this.src; // Define a imagem clicada no Modal
    });
});

// Fechar o Modal ao clicar no botão "x"
closeBtn.onclick = function () {
    modal.style.display = 'none';
};

// Fechar o Modal ao clicar fora da imagem
modal.onclick = function (event) {
    if (event.target === modal) {
        modal.style.display = 'none';
    }
};



//Modal dos cookie
let cookieEl = document.getElementById('cookieModal')
//Botões
let cookieButtons = document.querySelector('#cookieModal .cookie-buttons')

// Exibir o alerta assim que a página carregar
window.onload = function () {
    cookieEl.style.display = 'block';
};
//Oh ajeitar aki pq ele só pega o click em qualquer botão
cookieButtons.addEventListener('click', function () {
    cookieEl.style.display = 'none';
});


const form = document.querySelector("form");

form.addEventListener("submit", function(event) {
    // Exemplo de validação de formulário
    if (!form['pet-photo'].value || !form['description'].value) {
        alert("Por favor, preencha todos os campos.");
        event.preventDefault(); // Evita o envio do formulário
    }
});