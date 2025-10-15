<?php
// Inicializa o contador de movimentos
$contadorMovimentos = 0;

// Array com os dois movimentos
$movimentos = ["➡️ Direita", "⬅️ Esquerda"];

// Loop contínuo de movimentos
while (true) {
    // Determina o próximo movimento
    $indice = $contadorMovimentos % count($movimentos);
    $passo = $movimentos[$indice];

    // Mostra o passo atual
    echo "Passo " . ($contadorMovimentos + 1) . ": $passo\n";

    // Incrementa o contador
    $contadorMovimentos++;

    // Aguarda 1 segundo antes do próximo passo
    sleep(1);
}
?>
