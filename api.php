<?php
include("./config/configApi.php");

function callAPI($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        CONTENT_TYPE,
        TINDO_ID,
        TINDO_REF,
        ACCESS_TOKEN,
        CLIENT_REQUEST
    ]);

    $response = curl_exec($ch);

    if (curl_errno($ch)) {
        throw new Exception('Erro ao chamar a API: ' . curl_error($ch));
    }

    curl_close($ch);
    return json_decode($response, true);
}

// Carrega dados apenas uma vez
try {
    $data_api = [
        'config' => callAPI('https://api.tindo.com.br/ecommerce/configuracao'),
        'galeria' => callAPI('https://api.tindo.com.br/ecommerce/galeria'),
    ];
    $data_config = $data_api['config'];
    $data_galeria = $data_api['galeria'];
} catch (Exception $e) {
    echo 'Ocorreu um erro ao carregar os dados: ' . $e->getMessage();
    exit;
}
?>
