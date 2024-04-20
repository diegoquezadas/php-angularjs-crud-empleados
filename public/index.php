<?php
require_once '../app/init.php';  // Asegura que este archivo configura todo correctamente

function getJsonData() {
    return json_decode(file_get_contents("php://input"), true);
}

if (isset($_GET['controller']) && !empty($_GET['controller'])) {
    $controllerName = ucfirst(strtolower($_GET['controller'])) . 'Controller';
    
    if (class_exists($controllerName)) {
        $controller = new $controllerName();
        
        // Chequear si se ha especificado una acción
        $action = $_GET['action'] ?? 'index'; // default to 'index' if no action is specified
        
        if (method_exists($controller, $action)) {
            switch ($action) {
                case 'show':
                case 'destroy':
                    // Asegurarse de que se proporciona un ID para las acciones que lo requieren
                    if (!empty($_GET['id'])) {
                        $controller->$action($_GET['id']);
                    } else {
                        echo json_encode(['error' => 'ID is required for this action']);
                        http_response_code(400);
                    }
                    break;
                case 'store':
                case 'update':
                    // Para crear o actualizar, obtenemos datos JSON
                    $data = getJsonData();
                    if ($action === 'update' && empty($_GET['id'])) {
                        echo json_encode(['error' => 'ID is required for update']);
                        http_response_code(400);
                    } else {
                        // Llama a update o store con los datos y, en el caso de update, el ID
                        $controller->$action($_GET['id'] ?? null, $data);
                    }
                    break;
                default:
                    // Llamar a otros métodos que no requieren parámetros adicionales
                    $controller->$action();
                    break;
            }
        } else {
            echo json_encode(['error' => 'Method does not exist']);
            http_response_code(404);
        }
    } else {
        echo json_encode(['error' => 'Controller does not exist']);
        http_response_code(404);
    }
} else {
    echo json_encode(['error' => 'No controller specified']);
    http_response_code(400);
}
?>
