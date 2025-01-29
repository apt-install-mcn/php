<?php
include_once '../includes/Database.class.php';
include_once 'auth.php';

authenticate();

$database = new Database();
$db = $database->getConnection();

$data = json_decode(file_get_contents("php://input"));

if (!empty($data->id)) {
    $query = "UPDATE clientes SET ";
    $params = [];

    if (!empty($data->nombre)) {
        $query .= "nombre = :nombre ";
        $params[':nombre'] = $data->nombre;
    }

    if (!empty($data->email)) {
        if (!empty($data->nombre)) {
            $query .= ", ";
        }
        $query .= "email = :email ";
        $params[':email'] = $data->email;
    }

    $query .= "WHERE id = :id";
    $params[':id'] = $data->id;

    $stmt = $db->prepare($query);

    foreach ($params as $key => &$val) {
        $stmt->bindParam($key, $val);
    }

    if ($stmt->execute()) {
        echo json_encode(array("message" => "Cliente actualizado."));
    } else {
        echo json_encode(array("message" => "No se pudo actualizar el cliente."));
    }
} else {
    echo json_encode(array("message" => "Datos incompletos."));
}
?>
