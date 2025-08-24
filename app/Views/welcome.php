<?= $header ?>

<div class="container mt-5">
    <!-- Hero Section -->
    <div class="row align-items-center justify-content-center mb-5">
        <div class="col-lg-6 text-center text-lg-start">
            <h1 class="display-4 fw-bold text-primary mb-3">Bienvenido a <span class="text-dark">MangaStore</span></h1>
            <p class="lead mb-4">Tu destino para descubrir y adquirir los mejores mangas y cómics japoneses. Encuentra desde clásicos atemporales hasta las últimas novedades.</p>
            <div class="d-flex flex-wrap gap-3">
                <a href="<?= base_url('/mangas') ?>" class="btn btn-primary btn-lg px-4">
                    <i class="bi bi-book me-2"></i> Explorar Catálogo
                </a>
                <a href="<?= base_url('/mangas/crear') ?>" class="btn btn-outline-primary btn-lg px-4">
                    <i class="bi bi-plus-circle me-2"></i> Agregar Manga
                </a>
            </div>
        </div>
        <div class="col-lg-6 text-center mt-4 mt-lg-0">
            <img src="<?= base_url('uploads/bienvenida.jpg') ?>" class="img-fluid rounded shadow" alt="MangaStore - Tienda de Mangas" style="max-height: 400px;">
        </div>
    </div>
</div>

<?= $footer ?>