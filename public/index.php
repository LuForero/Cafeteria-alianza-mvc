<?php
session_start();

// Definir rutas
$controller = $_GET['controller'] ?? 'auth';     // controlador por defecto
$action     = $_GET['action'] ?? 'login';        // acción por defecto

// Cargar controlador
$controllerFile = "../controllers/" . ucfirst($controller) . "Controller.php";

if (file_exists($controllerFile)) {
    require_once $controllerFile;

    $controllerClass = ucfirst($controller) . "Controller";

    if (class_exists($controllerClass)) {
        $controllerObject = new $controllerClass();

        if (method_exists($controllerObject, $action)) {
            $controllerObject->$action();
        } else {
            echo "Error: Acción '$action' no encontrada en $controllerClass.";
        }
    } else {
        echo "Error: Clase '$controllerClass' no encontrada.";
    }
} else {
    echo "Error: Controlador '$controller' no encontrado.";
}
