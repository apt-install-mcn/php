<?php
   include_once '../includes/Database.class.php';
   
     $database = new Database();
     $db = $database->getConnection();

     $data = json_decode(file_get_contents("php://input"));

     if(!empty($data->nombre) && !empty($data->email)) {
         $query = "INSERT INTO clientes SET nombre=:nombre, email=:email";
         $stmt = $db->prepare($query);

         $stmt->bindParam(":nombre", $data->nombre);
         $stmt->bindParam(":email", $data->email);

         if($stmt->execute()) {
             echo json_encode(array("message" => "Cliente creado."));
         } else {
             echo json_encode(array("message" => "No se pudo crear el cliente."));
         }
     } else {
         echo json_encode(array("message" => "Datos incompletos."));
     }
     ?>