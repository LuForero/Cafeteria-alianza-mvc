<?php
class UserController
{
    private $model;

    public function __construct()
    {
        require_once 'models/User.php';
        $this->model = new User();
        session_start();
        if (!isset($_SESSION['user'])) {
            header('Location: /?controller=auth&action=login');
            exit;
        }
    }

    public function index()
    {
        $users = $this->model->getAll();
        require 'views/user/index.php';
    }

    public function create()
    {
        $error = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = trim($_POST['email']);
            $password = $_POST['password'];
            $role = $_POST['role'];

            if (empty($email) || empty($password) || empty($role)) {
                $error = 'Todos los campos son obligatorios.';
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error = 'El correo electrónico no es válido.';
            } elseif (strlen($password) < 6) {
                $error = 'La contraseña debe tener al menos 6 caracteres.';
            } else {
                // Verificar que no exista email
                if ($this->model->getUserByEmail($email)) {
                    $error = 'El correo ya está registrado.';
                } else {
                    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                    if ($this->model->create($email, $hashedPassword, $role)) {
                        header('Location: /?controller=user&action=index');
                        exit;
                    } else {
                        $error = 'Error al guardar el usuario.';
                    }
                }
            }
        }

        require 'views/user/create.php';
    }

    public function edit()
    {
        $error = '';
        $id = $_GET['id'] ?? null;

        if (!$id) {
            header('Location: /?controller=user&action=index');
            exit;
        }

        $user = $this->model->getById($id);

        if (!$user) {
            header('Location: /?controller=user&action=index');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = trim($_POST['email']);
            $role = $_POST['role'];

            if (empty($email) || empty($role)) {
                $error = 'Todos los campos son obligatorios.';
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error = 'El correo electrónico no es válido.';
            } else {
                // Verificar si existe otro usuario con el mismo email
                $existingUser = $this->model->getUserByEmail($email);
                if ($existingUser && $existingUser['id'] != $id) {
                    $error = 'El correo ya está registrado por otro usuario.';
                } else {
                    if ($this->model->update($id, $email, $role)) {
                        header('Location: /?controller=user&action=index');
                        exit;
                    } else {
                        $error = 'Error al actualizar el usuario.';
                    }
                }
            }
        }

        require 'views/user/edit.php';
    }

    public function delete()
    {
        $id = $_GET['id'] ?? null;
        if ($id) {
            $this->model->delete($id);
        }
        header('Location: /?controller=user&action=index');
        exit;
    }
}
