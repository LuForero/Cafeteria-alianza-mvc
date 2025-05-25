<?php
require_once __DIR__ . '/../models/User.php';

class AuthControllers
{
    public function login()
    {
        session_start(); // Inicia sesión

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $userModel = new User();
            $user = $userModel->getUserByEmail($email);

            if ($user && password_verify($password, $user['password'])) {
                // Guardar el usuario en sesión (evita guardar contraseña)
                unset($user['password']);
                $_SESSION['user'] = $user;

                // Redirigir al home o panel
                header("Location: ?controller=auth&action=home");
                exit;
            } else {
                echo "Credenciales incorrectas";
            }
        }

        // Mostrar el formulario si no es POST
        require_once __DIR__ . '/../views/layout/auth/login.php';
    }

    public function logout()
    {
        session_start();
        session_destroy();
        header("Location: /?controller=auth&action=login");
        exit();
    }

    public function home()
    {
        session_start();
        if (!isset($_SESSION['user'])) {
            header("Location: /?controller=auth&action=login");
            exit();
        }

        require_once __DIR__ . '/../views/layout/home/index.php';
    }
}
