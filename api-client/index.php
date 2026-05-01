<?php
require_once 'curl_client.php';
header('Content-Type: application/json');

$action = $_GET['action'] ?? 'list';
$id     = $_GET['id'] ?? 1;

// REBRE JSON

$input = json_decode(file_get_contents('php://input'), true) ?? [];

if ($action == 'list') {
    $posts = getData(API_BASE_URL . '/posts');
    $posts = array_slice($posts, 0, 5); // solo 5
    echo json_encode($posts, JSON_PRETTY_PRINT);

} elseif ($action == 'get') {
    $post = getData(API_BASE_URL . '/posts/' . $id);
    echo json_encode($post, JSON_PRETTY_PRINT);

} elseif ($action == 'create') {
    $result = postData(API_BASE_URL . '/posts', $input);
    echo json_encode($result, JSON_PRETTY_PRINT);

} elseif ($action == 'update') {
    $result = putData(API_BASE_URL . '/posts', $id, $input);
    echo json_encode($result, JSON_PRETTY_PRINT);

} elseif ($action == 'delete') {
    $result = deleteData(API_BASE_URL . '/posts', $id);
    echo json_encode($result, JSON_PRETTY_PRINT);
}