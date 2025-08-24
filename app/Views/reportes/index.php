<?= $header; ?>

<style>
    .card-reporte {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border: none;
        border-radius: 15px;
        overflow: hidden;
    }
    .card-reporte:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    }
    .reporte-icon {
        font-size: 3rem;
        margin-bottom: 1rem;
    }
</style>

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow border-0">
                <div class="card-header bg-primary text-white">
                    <h3 class="card-title mb-0"><i class="bi bi-file-earmark-pdf me-2"></i> Generador de Reportes PDF</h3>
                </div>
                <div class="card-body p-4">
                    <form id="formReporte" action="<?= base_url('reportes/generar') ?>" method="POST" target="_blank">
                        <div class="row mb-4">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Tipo de Reporte</label>
                                <select class="form-select" name="tipo_reporte" required>
                                    <option value="">Seleccionar tipo de reporte</option>
                                    <option value="inventario">Inventario Completo</option>
                                    <option value="precios">Reporte de Precios</option>
                                    <option value="generos">Reporte por Géneros</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Género</label>
                                <select class="form-select" name="genero" id="selectGenero">
                                    <option value="todos">Todos los géneros</option>
                                    <!-- Los géneros se cargarán con JavaScript -->
                                </select>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Fecha Inicio</label>
                                <input type="date" class="form-control" name="fecha_inicio">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Fecha Fin</label>
                                <input type="date" class="form-control" name="fecha_fin">
                            </div>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="bi bi-file-earmark-pdf me-2"></i> Generar Reporte PDF
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Cargar géneros disponibles
    fetch('<?= base_url('reportes/generos') ?>')
        .then(response => response.json())
        .then(generos => {
            const select = document.getElementById('selectGenero');
            generos.forEach(genero => {
                if (genero.genero) {
                    const option = document.createElement('option');
                    option.value = genero.genero;
                    option.textContent = genero.genero;
                    select.appendChild(option);
                }
            });
        });

    // Validación de fechas
    document.getElementById('formReporte').addEventListener('submit', function(e) {
        const fechaInicio = document.querySelector('input[name="fecha_inicio"]').value;
        const fechaFin = document.querySelector('input[name="fecha_fin"]').value;
        
        if (fechaInicio && fechaFin && fechaInicio > fechaFin) {
            e.preventDefault();
            alert('La fecha de inicio no puede ser mayor a la fecha fin');
        }
    });
});
</script>

<?= $footer; ?>