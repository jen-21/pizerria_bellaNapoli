
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
    <header class="container my-5">
        <div class="row align-items-center g-4">

            <div class="col-lg-6">
                <p class="texto-dorado fw-bold">PIZZERÍA ARTESANAL</p>

                <h1 class="display-4 fw-bold texto-vino">
                    El auténtico sabor de Italia
                </h1>

                <p class="fs-5">
                    Disfruta nuestras pizzas preparadas con ingredientes
                    frescos y el delicioso sabor que te encanta.
                </p>

                <a href="catalogo.php" class="btn btn-vino btn-lg">
                    Ver nuestro menú
                </a>

                <a href="arma_pizza.php" class="btn btn-outline-vino btn-lg">
                    Crea tu pizza
                </a>
            </div>

            <div class="col-lg-6">
                <img
                    src="img/pizza1.png"
                    class="img-fluid rounded shadow"
                    alt="Pizza artesanal">
            </div>

        </div>
    </header>

    <main class="container my-5">

        <div class="text-center mb-4">
            <p class="texto-dorado fw-bold mb-1">NUESTRAS ESPECIALIDADES</p>
            <h2 class="texto-vino fw-bold">Pizzas favoritas</h2>
            <p>Conoce algunos de nuestros sabores más populares.</p>
        </div>

        <div class="row g-4">

            <?php foreach ($pizzas as $pizza) { ?>

                <div class="col-md-4">
                    <div class="card h-100 shadow-sm tarjeta-pizza">

                        <img
                            src="<?php echo htmlspecialchars($pizza["imagen"]); ?>"
                            class="card-img-top imagen-pizza"
                            alt="<?php echo htmlspecialchars($pizza["nombre"]); ?>">

                        <div class="card-body">
                            <h5 class="card-title texto-vino fw-bold">
                                <?php echo htmlspecialchars($pizza["nombre"]); ?>
                            </h5>

                            <p class="card-text">
                                <?php echo htmlspecialchars($pizza["descripcion"]); ?>
                            </p>

                            <p class="fs-5 fw-bold texto-vino">
                                L. <?php echo number_format($pizza["precio"], 2); ?>
                            </p>

                            <a href="catalogo.php" class="btn btn-vino">
                                Ver detalles
                            </a>
                        </div>

                    </div>
                </div>

            <?php } ?>

        </div>
    </main>


</body>

</html>
