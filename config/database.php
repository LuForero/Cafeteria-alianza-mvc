<?php
class Database {
    private static $host = 'localhost:8889';
    private static $dbName = 'Coffee_Shop_alliace';
    private static $username = 'root';
    private static $password = 'root';

    public static function connect() {
        try {
            $conn = new PDO(
                "mysql:host=" . self::$host . ";dbname=" . self::$dbName,
                self::$username,
                self::$password
            );
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (PDOException $e) {
            die("Error de conexión: " . $e->getMessage());
        }
    }
}