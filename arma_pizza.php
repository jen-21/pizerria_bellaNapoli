<?php
session_start();

$precioBase = 150;

$masas = [
    'tradicional' => ['nombre' => 'Tradicional italiana',     'precio' => 0],
    'delgada'     => ['nombre' => 'Delgada / Crocante',       'precio' => 0],
    'orilla'      => ['nombre' => 'Orilla rellena de queso',  'precio' => 80],
];

$salsas = [
    'pomodoro' => 'Pomodoro clásica',
    'alfredo'  => 'Salsa blanca Alfredo',
    'pesto'    => 'Pesto genovés',
    'barbacoa' => 'Barbacoa dulce',
];

$quesos = [
    'mozzarella' => 'Mozzarella fresco',
    'parmesano'  => 'Queso parmesano reggiano',
    'provolone'  => 'Queso provolone',
];

$extras = [
    'pepperoni' => ['nombre' => 'Pepperoni',              'precio' => 20],
    'jamon'     => ['nombre' => 'Jamón de pavo',          'precio' => 18],
    'champinon' => ['nombre' => 'Champiñones frescos',    'precio' => 15],
    'pimiento'  => ['nombre' => 'Pimientos morrones',     'precio' => 12],
    'aceituna'  => ['nombre' => 'Aceitunas negras',       'precio' => 12],
    'albahaca'  => ['nombre' => 'Albahaca fresca',        'precio' => 10],
    'tocineta'  => ['nombre' => 'Tocineta ahumada',       'precio' => 22],
    'carne'     => ['nombre' => 'Carne molida artesanal', 'precio' => 25],
];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arma tu pizza | Bella Napoli</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-vino">
        <div class="container">
            <a class="navbar-brand fw-bold" href="index.php">Bella Napoli</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuNavegacion">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="menuNavegacion">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="index.php">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link" href="catalogo.php">Catálogo</a></li>
                    <li class="nav-item"><a class="nav-link active" href="arma_pizza.php">Arma tu pizza</a></li>
                    <li class="nav-item"><a class="nav-link" href="pedidos.php">Pedidos</a></li>
                    <li class="nav-item"><a class="nav-link" href="sucursales.php">Sucursales</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="container my-4 my-lg-5">
        <h1 class="h2 fw-bold mb-1 texto-vino">Arma tu pizza</h1>
        <p class="text-muted mb-4">Elige cada ingrediente </p>

        <div id="alertaExito" class="card border-0 shadow-sm border-start border-4 mb-4 rounded-4 borde-resumen-vino d-none">
            <div class="card-body p-4">
                <h2 class="h5 fw-bold mb-2">Tu pizza esta preparada</h2>
                <p id="textoResumenFinal" class="mb-2 text-secondary"></p>
                <strong class="texto-vino" id="totalFinalResumen"></strong>
            </div>
        </div>

        <form id="formularioPizza">
            <div class="row g-4">
                <div class="col-lg-8">
                    <fieldset class="card border-0 shadow-sm p-4 mb-3 rounded-4">
                        <legend class="h5 fw-bold d-flex align-items-center gap-2 mb-3 float-none w-auto"><span class="badge rounded-circle p-2 text-white bg-vino insignia-paso">1</span> Masa</legend>
                        <div class="row g-3">
                            <?php foreach ($masas as $identificador => $masa): ?>
                                <div class="col-md-4">
                                    <input type="radio" class="btn-check" name="masa" id="masa-<?= $identificador ?>" value="<?= $identificador ?>" data-nombre="<?= htmlspecialchars($masa['nombre']) ?>" data-precio="<?= $masa['precio'] ?>" <?= $identificador === 'tradicional' ? 'checked' : '' ?>>
                                    <label class="btn btn-outline-vino w-100 h-100 d-flex flex-column justify-content-between p-3 text-start rounded-3" for="masa-<?= $identificador ?>">
                                        <span class="fw-semibold mb-2"><?= htmlspecialchars($masa['nombre']) ?></span>
                                        <span class="small text-muted"><?= $masa['precio'] > 0 ? '+L ' . number_format($masa['precio'], 2) : 'Incluida' ?></span>
                                    </label>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </fieldset>

                    <div class="card border-0 shadow-sm p-4 mb-3 rounded-4">
                        <label for="salsa" class="h5 fw-bold d-flex align-items-center gap-2 mb-3">
                            <span class="badge rounded-circle p-2 text-white bg-vino insignia-paso">2</span> Salsa base
                        </label>
                        <select class="form-select form-select-lg rounded-3 select-personalizado" name="salsa" id="salsa" required>
                            <option value="" disabled selected>Elige una salsa</option>
                            <?php foreach ($salsas as $identificador => $nombreSalsa): ?>
                                <option value="<?= $identificador ?>"><?= htmlspecialchars($nombreSalsa) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <fieldset class="card border-0 shadow-sm p-4 mb-3 rounded-4">
                        <legend class="h5 fw-bold d-flex align-items-center gap-2 mb-3 float-none w-auto">
                            <span class="badge rounded-circle p-2 text-white bg-vino insignia-paso">3</span> Queso principal
                        </legend>
                        <div class="row g-3">
                            <?php foreach ($quesos as $identificador => $nombreQueso): ?>
                                <div class="col-md-4">
                                    <input type="radio" class="btn-check" name="queso" id="queso-<?= $identificador ?>" value="<?= $identificador ?>" data-nombre="<?= htmlspecialchars($nombreQueso) ?>" <?= $identificador === 'mozzarella' ? 'checked' : '' ?>>
                                    <label class="btn btn-outline-vino w-100 h-100 d-flex align-items-center p-3 text-start rounded-3" for="queso-<?= $identificador ?>"><span class="fw-semibold"><?= htmlspecialchars($nombreQueso) ?></span></label>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </fieldset>

                    <fieldset class="card border-0 shadow-sm p-4 mb-3 rounded-4">
                        <legend class="h5 fw-bold d-flex align-items-center gap-2 mb-3 float-none w-auto"> <span class="badge rounded-circle p-2 text-white bg-vino insignia-paso">4</span> Ingredientes adicionales</legend>
                        <div class="row g-3">
                            <?php foreach ($extras as $identificador => $extra): ?>
                                <div class="col-md-6">
                                    <input type="checkbox" class="btn-check" name="extras" id="extra-<?= $identificador ?>" value="<?= $identificador ?>" data-nombre="<?= htmlspecialchars($extra['nombre']) ?>" data-precio="<?= $extra['precio'] ?>">
                                    <label class="btn btn-outline-vino w-100 d-flex justify-content-between align-items-center p-3 text-start rounded-3" for="extra-<?= $identificador ?>">
                                        <span class="fw-semibold"><?= htmlspecialchars($extra['nombre']) ?></span>
                                        <span class="small text-muted">+L <?= number_format($extra['precio'], 2) ?></span>
                                    </label>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </fieldset>
                </div>

                <div class="col-lg-4">
                    <aside class="card text-white border-0 shadow sticky-top rounded-4 bg-vino" style="top: 1rem;">
                        <div class="card-body p-4">
                            <h2 class="h5 fw-bold mb-3">Tu pizza</h2>
                            <ul class="list-unstyled mb-4 small">
                                <li class="d-flex justify-content-between py-2 border-bottom border-light border-opacity-25"><span>Masa</span><span id="resumen-masa">Tradicional italiana</span></li>
                                <li class="d-flex justify-content-between py-2 border-bottom border-light border-opacity-25"><span>Salsa</span><span id="resumen-salsa">Sin elegir</span></li>
                                <li class="d-flex justify-content-between py-2 border-bottom border-light border-opacity-25"><span>Queso</span><span id="resumen-queso">Mozzarella fresco</span></li>
                                <li class="d-flex justify-content-between py-2"><span>Extras</span><span id="resumen-extras">Ninguno</span></li>
                            </ul>
                            <p class="small mb-1 opacity-75">Total: pizza base L 150.00</p>
                            <p class="h2 fw-bold mb-4" id="precio-total" data-base="<?= $precioBase ?>">L 150.00</p>
                            <button type="button" id="botonConfirmar" class="btn btn-dorado w-100 py-2 rounded-3">Confirmar mi pizza</button>
                        </div>
                    </aside>
                </div>
            </div>
        </form>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/armar_pizza.js"></script>
</body>
</html>