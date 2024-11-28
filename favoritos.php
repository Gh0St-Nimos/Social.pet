<?php
// Dados simulados (substituir pelo banco de dados futuramente)
$postsFavoritos = [
    ["post_id" => 1, "titulo" => "Melhores receitas", "conteudo" => "Adoro cozinhar e compartilhar receitas!"],
    ["post_id" => 2, "titulo" => "Passeio com meu cachorro", "conteudo" => "Foi um dia muito divertido no parque!"],
    ["post_id" => 3, "titulo" => "A importância da adoção de pets", "conteudo" => "Adote, não compre!"]
];

// Exporta os dados para a página HTML
header('Content-Type: application/json');
echo json_encode($postsFavoritos);
?>
