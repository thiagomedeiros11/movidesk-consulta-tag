<?php

// Informações e filtro para consulta dos tickets Movidesk
$url = 'https://api.movidesk.com/public/v1/tickets?';
$token = 'token=<token>';
$select = '&%24select=id,ownerTeam,createdDate,tags';
$filter = '&%24filter=createdDate%20gt%202023-02-27T00%3A00%3A00.00z';


// Montando a URL que será enviada
$movideskPost = $url . $token . $select . $filter;



// Configurações do CURL
$ch = curl_init();
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_URL, $movideskPost);
$content = curl_exec($ch);


// Tratando dados retornados na tela
$dados = json_decode(str_replace(';', ',', $content), true);

foreach ($dados as $row => $value):
    $plantao = $value['ownerTeam'];
    $tag = $value['tags'];
endforeach;

print_r($dados);

?>