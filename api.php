<?php
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener el cuerpo de la solicitud POST
    $postData = file_get_contents('php://input');
    
    // Guardar los datos en un archivo
    file_put_contents('data.json', $postData);
    
    // Responder con los datos recibidos
    echo json_encode(["status" => "success", "data_received" => json_decode($postData)]);
} else {
    // Si no es POST, devolver los datos guardados en data.json
    if (file_exists('data.json')) {
        echo file_get_contents('data.json');
    } else {
        echo json_encode(["status" => "no data available"]);
    }
}

