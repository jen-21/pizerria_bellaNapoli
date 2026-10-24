
<?php
session_start();

$pizzas = [
    [
        "nombre" => "Pizza Pepperoni",
        "descripcion" => "Queso mozzarella, salsa de tomate y pepperoni.",
        "precio" => 180,
        "imagen" => "img/pizza1.png"
    ],
    [
        "nombre" => "Pizza Hawaiana",
        "descripcion" => "Jamón, queso mozzarella y piña.",
        "precio" => 200,
        "imagen" => "img/pizza2.png"
    ],
    [
        "nombre" => "Pizza Suprema",
        "descripcion" => "Una deliciosa combinación de ingredientes y queso.",
        "precio" => 250,
        "imagen" => "img/pizza3.png"
    ]
];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Bella Napoli | Pizzería</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
    <link rel="stylesheet" href="css/estilos.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-vino">
        <div class="container">
            <a class="navbar-brand fw-bold" href="index.php">
                Bella Napoli
            </a>  
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
                <span class="navbar-toggler-icon"></span>
            </button> 

            <div class="collapse navbar-collapse" id="menu">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php">Inicio</a>
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
                        <a class="nav-link" href="sucursales.php">Sucursales</a>
                    </li>
                </ul>
            </div>

        </div>
    </nav>

</body>

</html>
