<?= $header; ?>

<style>
    .card {
        height: 100%;
    }
    .card-img-container {
        height: 180px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #f8f9fa;
        padding: 10px;
    }
    .card-img-top {
        max-height: 160px;
        width: auto;
        object-fit: contain;
    }
    .card-title {
        font-size: 1rem;
        font-weight: bold;
        margin-bottom: 0.5rem;
    }
    .card-text {
        font-size: 0.9rem;
        color: #6c757d;
        margin-bottom: 0.5rem;
    }
    .price {
        font-weight: bold;
        color: #e74c3c;
        font-size: 1rem;
    }
</style>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Catálogo de Mangas</h2>
    <a href="<?= base_url('/mangas/crear') ?>" class="btn btn-primary btn-sm">
        <i class="bi bi-plus-circle me-1"></i> Nuevo Manga
    </a>
</div>

<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-3">
    <?php if(empty($mangas)): ?>
        <div class="col-12 text-center py-5">
            <div class="alert alert-info">
                <h4>No hay mangas en el catálogo</h4>
                <p>Comienza agregando tu primer manga para vender</p>
                <a href="<?= base_url('/mangas/crear') ?>" class="btn btn-primary mt-2">Agregar Primer Manga</a>
            </div>
        </div>
    <?php else: ?>
        <?php foreach ($mangas as $manga): ?>
            <div class="col">
                <div class="card">
                    <div class="card-img-container">
                        <img src="<?= base_url('uploads/'.$manga['imagen']) ?>" class="card-img-top" alt="<?= $manga['titulo'] ?>">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><?= $manga['titulo'] ?></h5>
                        <?php if(!empty($manga['genero'])): ?>
                            <div class="text-muted small mb-2"><?= $manga['genero'] ?></div>
                        <?php endif; ?>
                        <p class="card-text"><?= 
                            strlen($manga['descripcion']) > 80 ? 
                            substr($manga['descripcion'], 0, 80).'...' : 
                            $manga['descripcion'] 
                        ?></p>
                        <div class="price mb-2">$<?= number_format($manga['precio'], 2) ?></div>
                        <div class="d-flex justify-content-between">
                            <a href="<?= base_url('/mangas/editar/'.$manga['id']) ?>" class="btn btn-warning btn-sm">
                                <i class="bi bi-pencil"></i> Editar
                            </a>
                            <a href="<?= base_url('/mangas/eliminar/'.$manga['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este manga?')">
                                <i class="bi bi-trash"></i> Eliminar
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>

<?= $footer; ?>