<?php
   include_once '../includes/Database.class.php';
   include_once 'auth.php';

authenticate();

$database = new Database();
$db = $database->getConnection();

$data = json_decode(file_get_contents("php://input"));

if (!empty($data->id)) {
    $query = "DELETE FROM clientes WHERE id = :id";
    $stmt = $db->prepare($query);

    $stmt->bindParam(':id', $data->id);

    if ($stmt->execute()) {
        echo json_encode(array("message" => "Cliente eliminado."));
    } else {
        echo json_encode(array("message" => "No se pudo eliminar el cliente."));
    }
} else {
    echo json_encode(array("message" => "Datos incompletos."));
}
?>