<?php
require_once 'config.php';

// function request()
// {
//     $ch = curl_init();

//     curl_setopt($ch, CURLOPT_URL, $url);
//     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//     $resposta = curl_exec($ch);
//     curl_close($ch);
//     return $resposta;
// }

// GET
function getData($url) {
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$resposta = curl_exec($ch);

// Control d'errors
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}

curl_close($ch);
return json_decode($resposta, true);

}

// POST
function postData($url, $data) {
$ch = curl_init($url);
$jsonData = json_encode($data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
// Enviar JSON
curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
// Headers
curl_setopt($ch, CURLOPT_HTTPHEADER, [
'Content-Type: application/json',
'Content-Length:' . strlen($jsonData)
]);

$resposta = curl_exec($ch);
curl_close($ch);
return json_decode($resposta, true);
}

// PUT
function putData($url, $id, $data) {
$ch = curl_init("$url/$id");
$jsonData = json_encode($data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
'Content-Type: application/json'
]);
$resposta = curl_exec($ch);
curl_close($ch);
return json_decode($resposta, true);
}

// DELETE
function deleteData($url, $id) {
$ch = curl_init("$url/$id");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
$resposta = curl_exec($ch);
curl_close($ch);
return $resposta;
}