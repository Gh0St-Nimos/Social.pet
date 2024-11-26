fetch('curtidas.php') // Faz uma requisição para o arquivo PHP
    .then(response => response.json()) // Converte a resposta para JSON
        .then(data => {
            const postsContainer = document.getElementById('posts');
            data.forEach(post => {
                const postDiv = document.createElement('div');
                postDiv.className = 'post';
                postDiv.innerHTML = `
                    <h2>${post.titulo}</h2>
                    <p>${post.conteudo}</p>
                `;
                postsContainer.appendChild(postDiv);
            });
        })
        .catch(error => console.error('Erro ao carregar os posts:', error));