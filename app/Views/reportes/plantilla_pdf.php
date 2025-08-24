<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?= $titulo_reporte ?></title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
        .header { text-align: center; margin-bottom: 30px; border-bottom: 2px solid #333; padding-bottom: 20px; }
        .header h1 { color: #2c3e50; margin: 0; }
        .header .subtitle { color: #7f8c8d; font-size: 16px; }
        .info { margin: 20px 0; padding: 15px; background: #f8f9fa; border-radius: 5px; }
        table { width: 100%; border-collapse: collapse; margin: 20px 0; }
        th { background-color: #2c3e50; color: white; padding: 12px; text-align: left; }
        td { padding: 10px; border-bottom: 1px solid #ddd; }
        tr:hover { background-color: #f5f5f5; }
        .total { font-weight: bold; background-color: #e74c3c; color: white; }
        .footer { margin-top: 50px; text-align: center; color: #7f8c8d; font-size: 12px; }
        .text-right { text-align: right; }
        .badge { background: #3498db; color: white; padding: 4px 8px; border-radius: 3px; font-size: 12px; }
    </style>
</head>
<body>
    <div class="header">
        <h1><?= $titulo_reporte ?></h1>
        <div class="subtitle">Generado el: <?= $fecha_generacion ?></div>
    </div>

    <div class="info">
        <strong>Total de registros:</strong> <?= count($mangas) ?> mangas
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Género</th>
                <th>Precio</th>
                <th>Fecha Creación</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $total = 0;
            foreach ($mangas as $manga): 
                $total += $manga['precio'];
            ?>
            <tr>
                <td><?= $manga['id'] ?></td>
                <td><?= $manga['titulo'] ?></td>
                <td><span class="badge"><?= $manga['genero'] ?? 'N/A' ?></span></td>
                <td>$<?= number_format($manga['precio'], 2) ?></td>
                <td><?= date('d/m/Y', strtotime($manga['creado_en'])) ?></td>
            </tr>
            <?php endforeach; ?>
            <tr class="total">
                <td colspan="3">TOTAL</td>
                <td colspan="2">$<?= number_format($total, 2) ?></td>
            </tr>
        </tbody>
    </table>

    <div class="footer">
        <p>Reporte generado por MangaStore - <?= date('Y') ?></p>
    </div>
</body>
</html>