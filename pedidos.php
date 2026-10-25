<?php
session_start();

//Pizzas Seleccionables
$pizzas = [
    [
        "id" => "pepperoni",
        "nombre" => "Pizza Pepperoni",
        "precio" => 180
    ],
    [
        "id" => "hawaiana",
        "nombre" => "Pizza Hawaiana",
        "precio" => 200
    ],
    [
        "id" => "suprema",
        "nombre" => "Pizza Suprema",
        "precio" => 250
    ],
    
];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Pedidos | Bella Napoli</title>

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
                        <a class="nav-link active" href="pedidos.php">Pedidos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="sucursales.php">Sucursales</a>
                    </li>
                </ul>
            </div>

        </div>
    </nav>

    <main class="container my-5">

        <!-- Encabezado -->
        <div class="text-center mb-5">
            <p class="texto-dorado fw-bold mb-1">El autentico sabor hasta la puerta de tu Hogar.</p>
            <h1 class="texto-vino fw-bold">Haz tu Pedido Ya</h1>
        </div>

        <section>
            <form action="pedidos.php" method="post">
                <div>
                    <label>Nombre completo:</label><br>
                    <input type="text" id="nombre" name="nombre" minlength="5" placeholder="Escribe tu Nombre" required>
                </div>
                <br>
                <div>
                    <label>Correo electrónico:</label><br>
                    <input type="email" id="correo" name="correo" placeholder="nombre@correo.com" required>
                </div>
                <br>
                <div>
                    <label>RTN: </label><br>
                    <input type="text" id="rtn" name="rtn" placeholder="Ingrese su RTN" required>
                </div>
                <br>
                <div>
                    <label>Telefono: </label><br>
                    <input type="text" id="telefono" name="telefono" placeholder="Ingrese su Telefono" required>
                </div>
                <br>
                <div class="mb-3">
                    <label for="pizza" class="form-label">Selecciona tu pizza:</label>
                    <select id="pizza" name="pizza" class="form-select" required>
                        <option value="">Selecciona una pizza</option>
                        <?php foreach ($pizzas as $pizza) { ?>
                            <option value = "<?php echo $pizza["id"];?>">
                                <?php echo $pizza["nombre"];?>
                            </option>
                        <?php } ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="tamano" class="form-label">Tamaño:</label>
                    <select id="tamano" name="tamano" class="form-select" required>
                        <option value="">Selecciona un tamaño</option>
                        <option value="pequena">Pequeña</option>
                        <option value="mediana">Mediana</option>
                        <option value="grande">Grande</option>
                    </select>
                </div>
        
                <div class="mb-3">
                    <label for="cantidad" class="form-label">Cantidad:</label>
                    <input type="number" id="cantidad" name="cantidad"
                        class="form-control" min="1" value="1" required>
                </div>

                <div>
                    <label >Modalidad de Entrega</label><br>
                    <select id="entrega" name="entrega" required>
                        <option value="domicilio" selected>Envio a Domicilio</option>
                        <option value="llevar">Para LLevar</option>
                        <option value="restaurante">Comer en Restaurante</option>
                    </select>
                </div>
                <br>
                <div>
                    <label >Metodo de Pago</label><br>
                    <select id="pago" name="pago" required>
                        <option value="efectivo">Efectivo</option>
                        <option value="tarjeta">Tarjeta de Credito/Debito</option>
                        <option value="tranferencia">Transferencia</option>
                    </select>
                </div>
                <br>
                <div>
                    <label>Direccion de Entrega y Punto de Referencia: </label><br>
                    <textarea id="direccion" name="direccion" required></textarea>
                </div>
                <div>
                    <button type="submit">Realizar Pedido</button>
                </div>
            </form>
        </section>

    </main>

    <!-- Pie de página -->
    <footer class="bg-vino text-white pt-4">
        <div class="container text-center pb-3">

            <h4 class="fw-bold">Bella Napoli</h4>
            <p>Tradición italiana y sabor en cada porción.</p>

            <p class="mb-1">
                Horario: lunes a domingo, 11:00 a. m. - 10:00 p. m.
            </p>

            <p class="mb-0">
                Bella Napoli © 2026 | Todos los derechos reservados
            </p>

        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>