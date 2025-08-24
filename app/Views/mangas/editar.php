<?= $header; ?>

<h2>Editar Manga</h2>
<form action="<?= base_url('/mangas/actualizar/'.$manga['id']) ?>" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $manga['id'] ?>">
    
    <div class="mb-3">
        <label class="form-label">Título</label>
        <input type="text" name="titulo" class="form-control" value="<?= $manga['titulo'] ?>" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Descripción</label>
        <textarea name="descripcion" class="form-control"><?= $manga['descripcion'] ?></textarea>
    </div>
    <div class="mb-3">
        <label class="form-label">Género</label>
        <input type="text" name="genero" class="form-control" value="<?= $manga['genero'] ?>">
    </div>
    <div class="mb-3">
        <label class="form-label">Precio</label>
        <input type="number" step="0.01" name="precio" class="form-control" value="<?= $manga['precio'] ?>" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Imagen actual</label>
        <div>
            <img src="<?= base_url('uploads/'.$manga['imagen']) ?>" height="100" class="img-thumbnail mb-2">
        </div>
        <label class="form-label">Cambiar imagen (opcional)</label>
        <input type="file" name="imagen" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Actualizar</button>
    <a href="<?= base_url('/mangas') ?>" class="btn btn-secondary">Cancelar</a>
</form>

<?= $footer; ?>