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

    <main class="container my-5">

        <!-- Encabezado -->
        <div class="text-center mb-5">
            <p class="texto-dorado fw-bold mb-1">ESTAMOS CERCA DE TI</p>
            <h1 class="texto-vino fw-bold">Nuestras sucursales</h1>
            <p>Visítanos y disfruta el auténtico sabor de Bella Napoli.</p>
        </div>

        <!-- Tarjetas de sucursales -->
        <div class="row g-4 mb-5">

            <?php foreach ($sucursales as $sucursal) { ?>

                <div class="col-md-4">
                    <div class="card h-100 shadow-sm tarjeta-pizza">
                        <div class="card-body">

                            <h4 class="texto-vino fw-bold">
                                <i class="bi bi-geo-alt-fill"></i>
                                <?php echo htmlspecialchars($sucursal["ciudad"], ENT_QUOTES, "UTF-8"); ?>
                            </h4>

                            <p>
                                <strong>Dirección:</strong>
                                <?php echo htmlspecialchars($sucursal["direccion"], ENT_QUOTES, "UTF-8"); ?>
                            </p>

                            <p>
                                <strong>Teléfono:</strong>
                                <?php echo htmlspecialchars($sucursal["telefono"], ENT_QUOTES, "UTF-8"); ?>
                            </p>

                            <p>
                                <strong>Horario:</strong>
                                <?php echo htmlspecialchars($sucursal["horario"], ENT_QUOTES, "UTF-8"); ?>
                            </p>

                        </div>
                    </div>
                </div>

            <?php } ?>

        </div>

        <!-- Panel de órdenes -->
        <section class="mb-5">

            <div class="d-flex flex-wrap justify-content-between
                        align-items-center gap-3 mb-3">

                <div>
                    <h2 class="texto-vino fw-bold">Panel de órdenes</h2>
                    <p class="mb-0">
                        Consulta de pedidos registrados en esta sesión.
                    </p>
                </div>

                <span class="badge bg-vino fs-6">
                    Órdenes: <?php echo count($pedidos); ?>
                </span>

            </div>

            <!-- Mensaje cuando no hay pedidos -->
            <?php if (empty($pedidos)) { ?>

                <div class="alert alert-info" role="alert">
                    Todavía no hay pedidos registrados en la sesión.
                </div>

            <?php } else { ?>

                <!-- Tabla de órdenes -->
                <div class="table-responsive">
                    <table class="table table-bordered table-striped align-middle tabla-ordenes">

                        <thead>
                            <tr>
                                <th>Folio</th>
                                <th>Cliente</th>
                                <th>Teléfono</th>
                                <th>Detalle de pizzas</th>
                                <th>Total (L.)</th>
                                <th>Estado</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($pedidos as $pedido) { ?>

                                <tr>
                                    <td>
                                        <?php
                                        echo htmlspecialchars(
                                            $pedido["folio"] ?? "Sin folio",
                                            ENT_QUOTES,
                                            "UTF-8"
                                        );
                                        ?>
                                    </td>

                                    <td>
                                        <?php
                                        echo htmlspecialchars(
                                            $pedido["cliente"] ?? $pedido["nombre"] ?? "Sin nombre",
                                            ENT_QUOTES,
                                            "UTF-8"
                                        );
                                        ?>
                                    </td>

                                    <td>
                                        <?php
                                        echo htmlspecialchars(
                                            $pedido["telefono"] ?? "No registrado",
                                            ENT_QUOTES,
                                            "UTF-8"
                                        );
                                        ?>
                                    </td>

                                    <td>
                                        <?php
                                        echo htmlspecialchars(
                                            $pedido["detalle"] ?? $pedido["pizza"] ?? "No especificado",
                                            ENT_QUOTES,
                                            "UTF-8"
                                        );
                                        ?>
                                    </td>

                                    <td>
                                        L.
                                        <?php
                                        echo number_format(
                                            (float) ($pedido["total"] ?? 0),
                                            2
                                        );
                                        ?>
                                    </td>

                                    <td>
                                        <span class="badge bg-success">
                                            <?php
                                            echo htmlspecialchars(
                                                $pedido["estado"] ?? "Registrado",
                                                ENT_QUOTES,
                                                "UTF-8"
                                            );
                                            ?>
                                        </span>
                                    </td>
                                </tr>

                            <?php } ?>
                        </tbody>

                    </table>
                </div>

            <?php } ?>
