<?php
session_start();

// Sucursales de Bella Napoli
$sucursales = [
    [
        "ciudad" => "Tegucigalpa",
        "direccion" => "Bulevar Morazán",
        "telefono" => "+504 2234-5678",
        "horario" => "Lunes a domingo, 11:00 a. m. - 10:00 p. m."
    ],
    [
        "ciudad" => "San Pedro Sula",
        "direccion" => "Barrio Guamilito",
        "telefono" => "+504 2234-5678",
        "horario" => "Lunes a domingo, 11:00 a. m. - 10:00 p. m."
    ],
    [
        "ciudad" => "La Ceiba",
        "direccion" => "Barrio La Merced",
        "telefono" => "+504 2234-5678",
        "horario" => "Lunes a domingo, 11:00 a. m. - 10:00 p. m."
    ]
];

// Vaciar las órdenes guardadas en la sesión
if ($_SERVER["REQUEST_METHOD"] === "POST" &&
    isset($_POST["vaciar"])) {
    unset($_SESSION["pedidos"]);
    header("Location: sucursales.php");
    exit;
}

$pedidos = $_SESSION["pedidos"] ?? [];
?>

