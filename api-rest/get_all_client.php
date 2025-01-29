<?php
   include_once '../includes/Database.class.php';
   include_once 'auth.php';

authenticate();

$database = new Database();
$db = $database->getConnection();

$query = "SELECT * FROM clientes";
$stmt = $db->prepare($query);
$stmt->execute();

$clientes = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($clientes);
?>
