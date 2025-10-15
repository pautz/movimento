<?php
// Mapeia os números para direções
$mapaMovimentos = [
    '1' => '⬆️ Para frente',
    '2' => '⬇️ Para trás',
    '3' => '⬅️ Para esquerda',
    '4' => '➡️ Para direita',
    '5' => '🔼 Para cima',
    '6' => '🔽 Para baixo'
];

// Entrada do usuário (exemplo: "123456")
$entradaUsuario = readline("Digite a sequência de passos (ex: 123456): ");

// Itera sobre cada caractere da sequência
for ($i = 0; $i < strlen($entradaUsuario); $i++) {
    $passo = $entradaUsuario[$i];

    if (array_key_exists($passo, $mapaMovimentos)) {
        echo "Passo " . ($i + 1) . ": " . $mapaMovimentos[$passo] . "\n";
        sleep(1); // Simula tempo entre os passos
    } else {
        echo "Passo " . ($i + 1) . ": ❌ Movimento inválido ('$passo')\n";
    }
}
?>
