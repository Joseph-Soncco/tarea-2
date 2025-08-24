<?= $header; ?>

<h2>Registrar Manga</h2>
<form action="<?= base_url('/mangas/guardar') ?>" method="POST" enctype="multipart/form-data">
    <div class="mb-3">
        <label class="form-label">Título</label>
        <input type="text" name="titulo" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Descripción</label>
        <textarea name="descripcion" class="form-control"></textarea>
    </div>
    <div class="mb-3">
        <label class="form-label">Género</label>
        <input type="text" name="genero" class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">Precio</label>
        <input type="number" step="0.01" name="precio" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Imagen</label>
        <input type="file" name="imagen" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-success">Guardar</button>
    <a href="<?= base_url('/mangas') ?>" class="btn btn-secondary">Cancelar</a>
</form>


<?= $footer; ?>