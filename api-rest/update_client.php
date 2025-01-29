<?php
include_once 'includes/Database.class.php';
include_once 'auth.php';

authenticate();

$database = new Database();
$db = $database->getConnection();

$data = json_decode(file_get_contents("php://input"));

if (!empty($data->id) && (!empty($data->nombre) || !empty($data->email))) {
    $query = "UPDATE clientes SET nombre = :nombre, email = :email WHERE id = :id";
    $stmt = $db->prepare($query);

    $stmt->bindParam(':nombre', $data->nombre);
    $stmt->bindParam(':email', $data->email);
    $stmt->bindParam(':id', $data->id);

    if ($stmt->execute()) {
        echo json_encode(array("message" => "Cliente actualizado."));
    } else {
        echo json_encode(array("message" => "No se pudo actualizar el cliente."));
    }
} else {
    echo json_encode(array("message" => "Datos incompletos."));
}
?>
