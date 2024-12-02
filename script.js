let loginModal, registerModal, cookieModal
window.onload = function () {
    console.log("loaded")
    registerModal = document.getElementById('registerModal');
    loginModal = document.getElementById('loginModal');


    //Isso aki [e do modal de fotos
    const modal = document.getElementById('imageModal');
    const closeBtn = document.getElementsByClassName('close')[0];

    //ele adiciona um listener em cada foto, pra verificar se deram click
    document.querySelectorAll('.abrirfoto').forEach(image => {
        const modalImg = document.getElementById('modalImage');
        image.addEventListener('click', function () {
            //ele are o modal e coloca a imagem
            modal.style.display = 'block';
            modalImg.src = this.src;
        });
    });

    //para fechar ---
    closeBtn.onclick = function () {
        modal.style.display = 'none';
    };
    modal.onclick = function (event) {
        if (event.target === modal) {
            modal.style.display = 'none';
        }
    };


//Modal dos cookie
    cookieModal = document.getElementById('cookieModal');
//Botões
    let cookieButtons = document.querySelector('#cookieModal .cookie-buttons')

// Exibir o alerta assim que a página carregar
    if (localStorage.getItem("cookie") !== "1") cookieModal.style.display = 'block';

//Oh ajeitar aki pq ele só pega o click em qualquer botão
    cookieButtons && cookieButtons.addEventListener('click', function () {
        cookieModal.style.display = 'none';
        localStorage.setItem("cookie", "1"); //Armazena o cookie
    });


    let sendingPost = false;
    //função que envia os formularios de forma automatica
    document.querySelectorAll("form[ajax]").forEach((form) => {
        console.log(form)
        form.addEventListener("submit", (e) => {
            e.preventDefault();
            e.stopPropagation();

            //valida se o formulario ta certo
            if (!sendingPost && e.target.checkValidity()) {
                sendingPost = true;
                const form = e.target;


                form.querySelector(".return").style.display = "none";
                form.querySelector(".return").textContent = "";
                form.querySelector(".return").classList.remove("sucesso", "carregando", "falha");

                //pega os dados do formulario
                let data = getFormObject(e.target);


                form.querySelector(".return").classList.add("alert-info");
                form.querySelector(".return").textContent = "Aguarde...";
                form.querySelector(".return").style.display = "block";

                let xhr = new XMLHttpRequest();
                xhr.open("POST", form.getAttribute("action"), true);
                xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
                xhr.responseType = "json";

                xhr.onload = () => {

                    let response = xhr.response;

                    console.log(response);

                    //aki ele valida o resultado que chegou da api
                    if (response.status) {
                        form.querySelector(".return").classList.add("sucesso");

                        response.refresh && window.location.reload();
                    } else {
                        form.querySelector(".return").classList.add("falha");
                        form.querySelector(".return").classList.remove("sucesso", "carregando");
                    }
                    form.querySelector(".return").innerHTML = response.msg;
                    form.querySelector(".return").style.display = "block";
                };

                xhr.onerror = () => {
                    console.log(xhr);
                    if (xhr.responseJSON && xhr.responseJSON.msg) {
                        form.querySelector(".return").classList.add("falha");
                        form.querySelector(".return").classList.remove("sucesso", "carregando");
                        form.querySelector(".return").textContent = xhr.responseJSON.msg;
                    } else {
                        form.querySelector(".return").classList.add("falha");
                        form.querySelector(".return").classList.remove("sucesso", "carregando");
                        form.querySelector(".return").textContent = xhr.status + " | Houve um erro ao comunicar com o servidor...";
                    }
                    form.querySelector(".return").style.display = "block";
                };

                //importante para poder reenviar
                xhr.onloadend = () => {
                    sendingPost = false;
                };

                xhr.send(JSON.stringify(data));


            }
        });
    });


}

function getFormObject(form) {
    let formData = new FormData(form);
    let object = {};
    formData.forEach((value, key) => {
        object[key] = value;
    });
    return object;
}