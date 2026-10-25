<?php
session_start();

$tamanos = [
    "personal" => ["etiqueta" => "Personal", "pulgadas" => 8],
    "mediana"  => ["etiqueta" => "Mediana",  "pulgadas" => 12],
    "familiar" => ["etiqueta" => "Familiar", "pulgadas" => 16],
    "gigante"  => ["etiqueta" => "Gigante",  "pulgadas" => 20],
];

$catalogo = [

    "clasicas" => [
        "titulo"      => "Pizzas Clásicas",
        "descripcion" => "Las recetas de siempre, con masa fina y mozzarella fresca.",
        "tipo"        => "pizza",
        "items"       => [
            [
                "nombre"       => "Margarita",
                "ingredientes" => "Salsa de tomate, mozzarella fresca, albahaca y aceite de oliva.",
                "imagen"       => "img/pizza_margarita.jpg",
                "precios"      => ["personal" => 95,  "mediana" => 160, "familiar" => 230, "gigante" => 300],
            ],
            [
                "nombre"       => "Pepperoni",
                "ingredientes" => "Queso mozzarella, salsa de tomate y pepperoni.",
                "imagen"       => "img/pizza_pepperoni.jpg",
                "precios"      => ["personal" => 110, "mediana" => 180, "familiar" => 260, "gigante" => 340],
            ],
            [
                "nombre"       => "Hawaiana",
                "ingredientes" => "Jamón, queso mozzarella y piña.",
                "imagen"       => "img/pizza_hawaiana.jpg",
                "precios"      => ["personal" => 120, "mediana" => 200, "familiar" => 280, "gigante" => 360],
            ],
            [
                "nombre"       => "Cuatro Quesos",
                "ingredientes" => "Mozzarella, gorgonzola, parmesano y provolone.",
                "imagen"       => "img/pizza_4_quesos.jpg",
                "precios"      => ["personal" => 130, "mediana" => 215, "familiar" => 295, "gigante" => 380],
            ],
        ],
    ],

    "gourmet" => [
        "titulo"      => "Pizzas Gourmet de la Casa",
        "descripcion" => "Ingredientes importados y combinaciones de autor.",
        "tipo"        => "pizza",
        "items"       => [
            [
                "nombre"       => "Prosciutto di Parma",
                "ingredientes" => "Prosciutto di Parma, rúcula, tomate cherry y lascas de parmesano.",
                "imagen"       => "img/pizza_pro_di_par.jpg",
                "precios"      => ["personal" => 160, "mediana" => 260, "familiar" => 360, "gigante" => 460],
            ],
            [
                "nombre"       => "Trufada Napolitana",
                "ingredientes" => "Crema de trufa, hongos portobello, mozzarella di bufala y aceite de trufa.",
                "imagen"       => "img/pizza_trufada.jpg",
                "precios"      => ["personal" => 175, "mediana" => 280, "familiar" => 385, "gigante" => 490],
            ],
            [
                "nombre"       => "Frutti di Mare",
                "ingredientes" => "Camarones, calamares, mejillones, ajo y perejil.",
                "imagen"       => "img/pizza_frutti_di_mare.jpg",
                "precios"      => ["personal" => 180, "mediana" => 290, "familiar" => 400, "gigante" => 510],
            ],
            [
                "nombre"       => "Carnívora Suprema",
                "ingredientes" => "Pepperoni, salchicha italiana, tocino, jamón y carne molida.",
                "imagen"       => "img/pizza_supreme.jpg",
                "precios"      => ["personal" => 150, "mediana" => 250, "familiar" => 345, "gigante" => 440],
            ],
        ],
    ],

    "calzones" => [
        "titulo"      => "Calzones y Especialidades al Horno",
        "descripcion" => "Horneados al momento en nuestro horno de piedra.",
        "tipo"        => "unico",
        "items"       => [
            [
                "nombre"       => "Calzone de Carnes",
                "ingredientes" => "Jamón, pepperoni, carne molida, ricotta y mozzarella.",
                "imagen"       => "img/calzone_di_carne.jpg",
                "precio"       => 190,
            ],
            [
                "nombre"       => "Calzone Vegetariano",
                "ingredientes" => "Espinaca, champiñones, pimiento, cebolla morada y ricotta.",
                "imagen"       => "img/calzone_vegetariano.jpeg",
                "precio"       => 170,
            ],
            [
                "nombre"       => "Focaccia con Romero",
                "ingredientes" => "Masa de focaccia, romero fresco, sal en escamas y aceite de oliva.",
                "imagen"       => "img/focaccia.jpg",
                "precio"       => 110,
            ],
        ],
    ],

    "bebidas-postres" => [
        "titulo"      => "Bebidas y Postres Italianos",
        "descripcion" => "El cierre ideal para tu pedido.",
        "tipo"        => "unico",
        "items"       => [
            [
                "nombre"       => "Tiramisú casero",
                "ingredientes" => "Mascarpone, café espresso, bizcocho de soletilla y cacao.",
                "imagen"       => "img/tiramisu.jpg",
                "precio"       => 95,
            ],
            [
                "nombre"       => "Cannoli sicilianos",
                "ingredientes" => "Masa crujiente rellena de crema de ricotta y chispas de chocolate.",
                "imagen"       => "img/cannoli_siciliani.jpg",
                "precio"       => 85,
            ],
            [
                "nombre"       => "Bebidas gaseosas",
                "ingredientes" => "Variedad de gaseosas en presentación de 355 ml.",
                "imagen"       => "img/gaseosas.jpg",
                "precio"       => 35,
            ],
            [
                "nombre"       => "Refrescos naturales",
                "ingredientes" => "Limonada, naranjada y horchata preparadas al día.",
                "imagen"       => "img/naturales.jpg",
                "precio"       => 45,
            ],
        ],
    ],
];

$errores = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $nombre = trim($_POST["nombre"] ?? "");
    $correo = trim($_POST["correo"] ?? "");
    $rtn = trim($_POST["rtn"] ?? "");
    $telefono = trim($_POST["telefono"] ?? "");

    if (mb_strlen($nombre) < 5) {
        $errores[] = "El nombre debe tener al menos 5 caracteres.";
    }

    if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        $errores[] = "El correo electrónico no es válido.";
    }

    if (!preg_match('/^[0-9]{14}$/', $rtn)) {
        $errores[] = "El RTN debe contener exactamente 14 dígitos numéricos.";
    }

    if (!preg_match('/^[0-9]{8}$/', $telefono)) {
        $errores[] = "El teléfono debe contener exactamente 8 dígitos numéricos.";
    }

    $productoId = $_POST["pizza"] ?? "";
    $tamano = $_POST["tamano"] ?? "";
    $cantidad = filter_input(INPUT_POST, "cantidad", FILTER_VALIDATE_INT);
    $entrega = $_POST["entrega"] ?? "";
    $pago = $_POST["pago"] ?? "";

    // Buscar el producto en el catalogo
    $productoSeleccionado = null;
    $tipoProducto = null;
    $partesProducto = explode(":", $productoId, 2);

    if (count($partesProducto) === 2) {
        $idCategoria = $partesProducto[0];

        $indiceProducto = filter_var(
            $partesProducto[1],
            FILTER_VALIDATE_INT
        );

        if (
            $indiceProducto !== false &&
            $indiceProducto !== null &&
            $indiceProducto >= 0 &&
            isset($catalogo[$idCategoria]["items"][$indiceProducto])
        ) {
            $productoSeleccionado =
                $catalogo[$idCategoria]["items"][$indiceProducto];

            $tipoProducto = $catalogo[$idCategoria]["tipo"];
        }
    }

    if ($productoSeleccionado === null) {
        $errores[] = "Debes seleccionar un producto válido.";
    }

    // Validar tamano para las pizzas
    if ($tipoProducto === "pizza") {
        if (!isset($tamanos[$tamano])) {
            $errores[] = "Debes seleccionar un tamaño válido.";
        }
    }

    // Validar cantidad
    if ($cantidad === false || $cantidad === null || $cantidad < 1) {
        $errores[] = "La cantidad debe ser un número entero mayor que cero.";
    }

    // Validar entrega
    $entregasValidas = ["domicilio", "llevar", "restaurante"];

    if (!in_array($entrega, $entregasValidas, true)) {
        $errores[] = "Debes seleccionar un tipo de entrega válido.";
    }

    // Validar metodo de pago
    $pagosValidos = ["efectivo", "tarjeta", "transferencia"];

    if (!in_array($pago, $pagosValidos, true)) {
        $errores[] = "Debes seleccionar un método de pago válido.";
    }

    //Calcular Subtotal
    $precioUnitario = 0;
    $subtotal = 0;
    $descuento = 0;
    $isv = 0;
    $delivery = 0;
    $total = 0;

    if (empty($errores) && $productoSeleccionado !== null) {

        if ($tipoProducto === "pizza") {
            $precioUnitario = $productoSeleccionado["precios"][$tamano];
        } else {
            $precioUnitario = $productoSeleccionado["precio"];
        }

        $subtotal = $precioUnitario * $cantidad;

        if ($tipoProducto === "pizza" && $cantidad >= 3) {
            $descuento = $subtotal * 0.10;
        }

        $subtotalNeto = $subtotal - $descuento;

        $isv = $subtotalNeto * 0.15;

        if ($entrega === "domicilio") {
            $delivery = 45;
        }

        $total = $subtotalNeto + $isv + $delivery;
    }

    
    if (empty($errores) && isset($total)) {

        // Generar un folio para el pedido
        $folio = "ORD-NAP-" . random_int(10000, 99999);

        // Preparar los datos del pedido
        $orden = [
            "folio" => $folio,
            "nombre" => $nombre,
            "correo" => $correo,
            "rtn" => $rtn,
            "telefono" => $telefono,
            "producto" => $productoSeleccionado["nombre"],
            "tipo_producto" => $tipoProducto,
            "tamano" => $tipoProducto === "pizza"
                ? $tamanos[$tamano]["etiqueta"]
                : "No aplica",
            "cantidad" => $cantidad,
            "precio_unitario" => $precioUnitario,
            "subtotal" => $subtotal,
            "descuento" => $descuento,
            "isv" => $isv,
            "delivery" => $delivery,
            "total" => $total,
            "entrega" => $entrega,
            "pago" => $pago,
            "estado" => "Pendiente"
        ];

        $_SESSION["pedidos"][] = $orden;
    }

}
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

        <?php if ($_SERVER["REQUEST_METHOD"] === "POST" && !empty($errores)) { ?>
            <div class="alert alert-danger" role="alert">
                <strong>No se pudo procesar el pedido:</strong>
                <ul class="mb-0">
                    <?php foreach ($errores as $error) { ?>
                        <li><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></li>
                    <?php } ?>
                </ul>
            </div>
        <?php } ?>

        <?php if ($_SERVER["REQUEST_METHOD"] === "POST" && empty($errores) && isset($orden)) { ?>
            <div class="container my-4">
                <div class="card shadow">
                    <div class="card-body">
                        <h2 class="card-title">Bella Napoli</h2>
                        <h5>Comprobante digital</h5>

                        <p>
                            <strong>Folio:</strong>
                            <?php echo htmlspecialchars($orden["folio"], ENT_QUOTES, 'UTF-8'); ?>
                        </p>

                        <hr>

                        <p><strong>Cliente:</strong>
                            <?php echo htmlspecialchars($orden["nombre"], ENT_QUOTES, 'UTF-8'); ?>
                        </p>

                        <p><strong>Teléfono:</strong>
                            <?php echo htmlspecialchars($orden["telefono"], ENT_QUOTES, 'UTF-8'); ?>
                        </p>

                        <p><strong>Producto:</strong>
                            <?php echo htmlspecialchars($orden["producto"], ENT_QUOTES, 'UTF-8'); ?>
                        </p>

                        <p><strong>Tamaño:</strong>
                            <?php echo htmlspecialchars($orden["tamano"], ENT_QUOTES, 'UTF-8'); ?>
                        </p>

                        <p><strong>Cantidad:</strong>
                            <?php echo (int) $orden["cantidad"]; ?>
                        </p>

                        <hr>

                        <p>Precio unitario:
                            L. <?php echo number_format($orden["precio_unitario"], 2); ?>
                        </p>

                        <p>Subtotal:
                            L. <?php echo number_format($orden["subtotal"], 2); ?>
                        </p>

                        <p>Descuento:
                            − L. <?php echo number_format($orden["descuento"], 2); ?>
                        </p>

                        <p>ISV (15 %):
                            L. <?php echo number_format($orden["isv"], 2); ?>
                        </p>

                        <p>Delivery:
                            L. <?php echo number_format($orden["delivery"], 2); ?>
                        </p>

                        <hr>

                        <h4>Total a pagar:
                            L. <?php echo number_format($orden["total"], 2); ?>
                        </h4>

                        <p><strong>Estado:</strong>
                            <?php echo htmlspecialchars($orden["estado"], ENT_QUOTES, 'UTF-8'); ?>
                        </p>
                    </div>
                </div>
            </div>
        <?php } ?>

        <section>
            <form action="pedidos.php" method="post">
                <?php if (!empty($errores)) { ?>
                    <div class="alert alert-danger" role="alert">
                        <strong>Hay errores en tu pedido:</strong>

                        <ul class="mb-0">
                            <?php foreach ($errores as $error) { ?>
                                <li>
                                    <?php echo htmlspecialchars($error, ENT_QUOTES, "UTF-8"); ?>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                <?php } ?>
                <div>
                    <label>Nombre completo:</label><br>
                    <input type="text" id="nombre" name="nombre" placeholder="Escribe tu Nombre" required>
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
                    <label for="pizza" class="form-label">Selecciona tu producto:</label>

                    <select id="pizza" name="pizza" class="form-select" required>
                        <option value="">Selecciona un producto</option>

                        <?php foreach ($catalogo as $idCategoria => $categoria) { ?>
                            <optgroup label="<?php echo htmlspecialchars($categoria["titulo"], ENT_QUOTES, "UTF-8"); ?>">

                                <?php foreach ($categoria["items"] as $indice => $item) { ?>
                                    <option value="<?php echo $idCategoria . ':' . $indice; ?>">
                                        <?php echo htmlspecialchars($item["nombre"], ENT_QUOTES, "UTF-8"); ?>
                                    </option>
                                <?php } ?>

                            </optgroup>
                        <?php } ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="tamano" class="form-label">Tamaño:</label>
                    <select id="tamano" name="tamano" class="form-select" required>
                        <option value="">Selecciona un tamaño</option>
                        <option value="personal">Personal</option>
                        <option value="mediana">Mediana</option>
                        <option value="familiar">Familiar</option>
                        <option value="gigante">Gigante</option>
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