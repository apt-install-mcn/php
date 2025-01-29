# API REST de Clientes

Este proyecto es una API REST simple para gestionar clientes, implementada en PHP y MySQL sin usar frameworks.

## Funcionalidades

- Crear, leer, actualizar y eliminar clientes.
- Autenticación básica para proteger los endpoints.

## Requisitos

- PHP 7.x o superior
- MySQL
- Servidor web (puedes usar el servidor embebido de PHP)

## Instalación

1. Clona este repositorio en tu máquina local.
2. Configura la base de datos:
   - Usa el archivo `sql/setup.sql` para crear la base de datos y la tabla.
   - Ejecuta los comandos SQL en tu servidor MySQL.

3. Configura el servidor:
   - Navega al directorio del proyecto.
   - Inicia el servidor embebido de PHP:
     ```bash
     php -S localhost:8000
     ```

## Uso

1. Abre `index.html` en tu navegador: `http://localhost:8000/index.html`.
2. Usa la interfaz para crear, ver y eliminar clientes.

## Endpoints

- **GET** `/api-rest/get_all_client.php`: Obtiene todos los clientes.
- **POST** `/api-rest/create_client.php`: Crea un nuevo cliente.
- **DELETE** `/api-rest/delete_client.php`: Elimina un cliente.

## Autenticación

Usa autenticación básica con las siguientes credenciales:
- **Usuario:** `admin`
- **Contraseña:** `password123`

## Notas

- Asegúrate de que el servidor MySQL esté corriendo.
- Verifica que las rutas de inclusión en los archivos PHP sean correctas.

