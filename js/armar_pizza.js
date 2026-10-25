document.addEventListener('DOMContentLoaded', function() {
    const formularioPizza = document.getElementById('formularioPizza');
    const etiquetaPrecioTotal = document.getElementById('precio-total');
    const precioBase = Number(etiquetaPrecioTotal.dataset.base);

    function obtenerNombreOpcion(entrada) {
        if (!entrada) return '—';
        const etiqueta = formularioPizza.querySelector(`label[for="${entrada.id}"]`);
        return etiqueta ? etiqueta.querySelector('.fw-semibold').textContent.trim() : '—';
    }

    function actualizarCalculos() {
        let total = precioBase;

        // Masa seleccionada
        const masaSeleccionada = formularioPizza.querySelector('input[name="masa"]:checked');
        const nombreMasa = masaSeleccionada ? masaSeleccionada.dataset.nombre : '—';
        document.getElementById('resumen-masa').textContent = nombreMasa;
        total += Number(masaSeleccionada ? masaSeleccionada.dataset.precio : 0);

        // Salsa seleccionada
        const selectSalsa = document.getElementById('salsa');
        const nombreSalsa = selectSalsa.value ? selectSalsa.options[selectSalsa.selectedIndex].text : 'Sin elegir';
        document.getElementById('resumen-salsa').textContent = nombreSalsa;

        // Queso seleccionado
        const quesoSeleccionado = formularioPizza.querySelector('input[name="queso"]:checked');
        const nombreQueso = quesoSeleccionado ? quesoSeleccionado.dataset.nombre : '—';
        document.getElementById('resumen-queso').textContent = nombreQueso;

        // Extras seleccionados
        const extrasSeleccionados = formularioPizza.querySelectorAll('input[name="extras"]:checked');
        let nombresExtras = [];
        extrasSeleccionados.forEach(function(extra) {
            total += Number(extra.dataset.precio);
            nombresExtras.push(extra.dataset.nombre);
        });

        const textoExtras = nombresExtras.length === 0 ? 'Ninguno' : nombresExtras.join(', ');
        document.getElementById('resumen-extras').textContent = textoExtras;

        // Actualizar total en pantalla
        etiquetaPrecioTotal.textContent = 'L ' + total.toFixed(2);
    }

    formularioPizza.addEventListener('change', actualizarCalculos);

    // Acción del botón de confirmación
    const botonConfirmar = document.getElementById('botonConfirmar');
    if (botonConfirmar) {
        botonConfirmar.addEventListener('click', function() {
            const selectSalsa = document.getElementById('salsa');
            if (!selectSalsa.value) {
                alert('Por favor elige una salsa base antes de continuar.');
                selectSalsa.focus();
                return;
            }

            const masa = document.getElementById('resumen-masa').textContent;
            const salsa = document.getElementById('resumen-salsa').textContent;
            const queso = document.getElementById('resumen-queso').textContent;
            const extras = document.getElementById('resumen-extras').textContent;
            const total = etiquetaPrecioTotal.textContent;

            const alerta = document.getElementById('alertaExito');
            const textoFinal = document.getElementById('textoResumenFinal');
            const totalFinal = document.getElementById('totalFinalResumen');

            textoFinal.textContent = `${masa}, salsa ${salsa}, y ${queso}. Extras: ${extras}.`;
            totalFinal.textContent = `Total: ${total}`;
            alerta.classList.remove('d-none');
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    }

    // Inicializar al cargar
    actualizarCalculos();
});