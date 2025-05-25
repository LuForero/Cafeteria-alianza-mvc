<?php
$host = 'localhost';
$usuario = 'root';
$password = 'root';
$bd = 'Coffee_Shop_alliace';
$puerto = 8889;

$mysqli = new mysqli($host, $usuario, $password, $bd, $puerto);

if ($mysqli->connect_error) {
    die("Error de conexión: " . $mysqli->connect_error);
}

echo "¡Conexión exitosa!";
