<?php
// Verifique se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Inicialize um array para armazenar os dados
    $data = [];

    // Adicione o nome do usuário e o presente selecionado ao array
    $data[] = [
        'name' => $_POST['name'],
        'gift' => $_POST['gift'],
    ];

    // Verifique se o arquivo CSV existe
    if (!file_exists('gifts.csv')) {
        // Caso contrário, crie o arquivo CSV e adicione cabeçalhos
        $fp = fopen('gifts.csv', 'w');
        fputcsv($fp, ['Name', 'Gift']);
        fclose($fp);
    }

    // Abra o arquivo CSV no modo anexar
    $fp = fopen('gifts.csv', 'a');

    // Grave os dados no arquivo CSV
    fputcsv($fp, [$_POST['name'], $_POST['gift']]);

    // Feche o arquivo CSV
    fclose($fp);

    // Defina os cabeçalhos apropriados para baixar o arquivo CSV
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename=gifts.csv');
    header('Pragma: no-cache');
    header('Expires: 0');

    // Leia e produza o arquivo CSV
    readfile('gifts.csv');
}
header('Location: ../pages/agradecer.html');
exit;
?>
