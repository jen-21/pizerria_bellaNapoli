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
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["vaciar"])) {
    unset($_SESSION["pedidos"]);
    header("Location: sucursales.php");
    exit;
}

// Obtener los pedidos de la sesión
$pedidos = $_SESSION["pedidos"] ?? [];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sucursales | Bella Napoli</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="css/estilos.css">
</head>

<body>

    <!-- Menú de navegación -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-vino">
        <div class="container">

            <a class="navbar-brand fw-bold" href="index.php">
                Bella Napoli
            </a>

            <button class="navbar-toggler" type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#menu"
                    aria-controls="menu"
                    aria-expanded="false"
                    aria-label="Mostrar menú">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="menu">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="catalogo.php">Catálogo</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="arma_pizza.php">Arma tu pizza</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pedidos.php">Pedidos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="sucursales.php">Sucursales</a>
                    </li>
                </ul>
            </div>

        </div>
    </nav>

   