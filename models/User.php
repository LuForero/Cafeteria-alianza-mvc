<?php
class User
{
    private $db;

    public function __construct()
    {
        $this->db = new mysqli('localhost', 'root', 'root', 'Coffee_Shop_alliace', 8889);

        if ($this->db->connect_error) {
            die('Error de conexión: ' . $this->db->connect_error);
        }
    }

    // Obtener todos los usuarios
    public function getAll()
    {
        $sql = "SELECT * FROM users";
        $result = $this->db->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Crear un nuevo usuario
    public function create($email, $password, $role)
    {
        $stmt = $this->db->prepare("INSERT INTO users (email, password, role) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $email, $password, $role);
        return $stmt->execute();
    }

    // Obtener usuario por ID
    public function getById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    // Actualizar usuario
    public function update($id, $email, $role)
    {
        $stmt = $this->db->prepare("UPDATE users SET email = ?, role = ? WHERE id = ?");
        $stmt->bind_param("ssi", $email, $role, $id);
        return $stmt->execute();
    }

    // Eliminar usuario
    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM users WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    // Obtener usuario por email (para login o validación)
    public function getUserByEmail($email)
    {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
}
