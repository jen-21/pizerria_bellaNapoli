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

function formatearPrecio($valor)
{
    return "L " . number_format($valor, 2);
}
?>

<!DOCTYPE html>

<html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Bella Napoli | Pizzería</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
            rel="stylesheet">
        <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
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
                            <a class="nav-link" href="index.php">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="catalogo.php">Catálogo</a>
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

        <header class="container my-5 text-center">
            <h1 class="fw-bold">Nuestro menú</h1>
            <p class="lead mb-4">
                Pizzas, calzones y postres preparados al momento. Elige tu categoría:
            </p>

            <div class="d-flex flex-wrap justify-content-center gap-2">
                <?php foreach ($catalogo as $idCategoria => $categoria): ?>
                    <a href="#<?= htmlspecialchars($idCategoria) ?>"
                    class="btn btn-outline-dark rounded-pill">
                        <?= htmlspecialchars($categoria["titulo"]) ?>
                    </a>
                <?php endforeach; ?>
            </div>
        </header>

        <main class="container my-5">

            <?php foreach ($catalogo as $idCategoria => $categoria): ?>
                <section id="<?= htmlspecialchars($idCategoria) ?>" class="mb-5 pt-3">

                    <div class="mb-4 border-bottom pb-2">
                        <h2 class="fw-bold mb-1"><?= htmlspecialchars($categoria["titulo"]) ?></h2>
                        <p class="text-muted mb-0"><?= htmlspecialchars($categoria["descripcion"]) ?></p>
                    </div>

                    <div class="row g-4">
                        <?php foreach ($categoria["items"] as $item): ?>
                            <div class="col-12 col-md-6 col-xl-3">
                                <article class="card h-100 shadow-sm">

                                    <div class="ratio ratio-4x3">
                                        <img src="<?= htmlspecialchars($item["imagen"]) ?>"
                                            class="card-img-top object-fit-cover"
                                            alt="<?= htmlspecialchars($item["nombre"]) ?>"
                                            loading="lazy">
                                    </div>

                                    <div class="card-body d-flex flex-column">
                                        <h3 class="h5 fw-bold">
                                            <?= htmlspecialchars($item["nombre"]) ?>
                                        </h3>
                                        <p class="card-text small text-muted">
                                            <?= htmlspecialchars($item["ingredientes"]) ?>
                                        </p>

                                        <div class="mt-auto">
                                            <?php if ($categoria["tipo"] === "pizza"): ?>

                                                <table class="table table-sm table-striped mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">Tamaño</th>
                                                            <th scope="col" class="text-end">Precio</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach ($tamanos as $claveTamano => $tamano): ?>
                                                            <tr>
                                                                <td>
                                                                    <?= htmlspecialchars($tamano["etiqueta"]) ?>
                                                                    (<?= (int) $tamano["pulgadas"] ?>")
                                                                </td>
                                                                <td class="text-end fw-semibold">
                                                                    <?= formatearPrecio($item["precios"][$claveTamano]) ?>
                                                                </td>
                                                            </tr>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                </table>

                                            <?php else: ?>

                                                <p class="fs-5 fw-bold mb-0">
                                                    <?= formatearPrecio($item["precio"]) ?>
                                                </p>

                                            <?php endif; ?>
                                        </div>
                                    </div>

                                </article>
                            </div>
                        <?php endforeach; ?>
                    </div>

                </section>
            <?php endforeach; ?>

        </main>

        <footer class="bg-vino text-white pt-5">

            <div class="container">
                <div class="row g-4">

                    <div class="col-md-6 col-lg-3">
                        <h4 class="fw-bold"> Bella Napoli</h4>
                        <p>
                            Tradición italiana y sabor en cada porción.
                            ¡Nos encanta compartir buenos momentos contigo!
                        </p>
                    </div>

                    <div class="col-md-6 col-lg-3">
                        <h5 class="fw-bold texto-dorado">Contáctanos</h5>
                        <p> +504 2234-5678</p>
                        <p> WhatsApp: +504 9876-5432</p>
                        <p> info@bellanapoli.hn</p>
                    </div>

                    <div class="col-md-6 col-lg-3">
                        <h5 class="fw-bold texto-dorado">Nuestras sucursales</h5>
                        <p> Tegucigalpa — Bulevar Morazan</p>
                        <p> San Pedro Sula — Barrio Guamilito</p>
                        <p> La Ceiba — Barrio la Merced</p>

                        <a href="sucursales.php" class="link-light">
                            Ver sucursales
                        </a>
                    </div>

                    <div class="col-md-6 col-lg-3">
                        <h5 class="fw-bold texto-dorado">Síguenos en redes</h5>

                        <div class="d-flex gap-3 mt-3">

                            <a href="https://www.facebook.com/"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="icono-red facebook"
                            aria-label="Facebook">
                                <i class="bi bi-facebook"></i>
                            </a>

                            <a href="https://www.instagram.com/"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="icono-red instagram"
                            aria-label="Instagram">
                                <i class="bi bi-instagram"></i>
                            </a>

                            <a href="https://www.tiktok.com/"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="icono-red tiktok"
                            aria-label="TikTok">
                                <i class="bi bi-tiktok"></i>
                            </a>

                        </div>

                        <h6 class="fw-bold">Horario</h6>
                        <p>Lunes a domingo: 11:00 a. m. – 10:00 p. m.</p>
                    </div>

                </div>

                <hr class="border-light">

                <div class="text-center pb-3">
                    <small>
                        Bella Napoli © 2026 | Todos los derechos reservados
                    </small>
                </div>
            </div>

        </footer>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>



    </body>

</html>
