<?php
// Validar que la solicitud provenga de localhost o 127.0.0.1
if ($_SERVER['REMOTE_ADDR'] !== '127.0.0.1' && $_SERVER['REMOTE_ADDR'] !== '::1') {
    http_response_code(403);
    echo 'Acceso denegado';
    exit;
}

// Verificar el método POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo 'Método no permitido';
    exit;
}

// Obtener los datos del formulario
$usuario = $_POST['usuario'] ?? '';
$password = $_POST['password'] ?? '';

// Validar campos
if (empty($usuario) || empty($password)) {
    http_response_code(400);
    echo 'Usuario y contraseña son requeridos';
    exit;
}

// Verificar credenciales
if ($usuario === 'Admin' && $password === 'Admin') {
    // Credenciales correctas, redirigir a otra página
    header('Location: welcome.php');
    exit;
} else {
    http_response_code(401);
    echo 'Credenciales incorrectas';
    exit;
}
?>
