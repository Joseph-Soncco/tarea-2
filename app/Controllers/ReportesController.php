<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Manga;
use Dompdf\Dompdf;
use Dompdf\Options;

class ReportesController extends BaseController
{
    public function index()
    {
        $data['header'] = view('Layouts/header');
        $data['footer'] = view('Layouts/footer');
        
        return view('reportes/index', $data);
    }

    public function generarReporte()
    {
        $tipo = $this->request->getPost('tipo_reporte');
        $fecha_inicio = $this->request->getPost('fecha_inicio');
        $fecha_fin = $this->request->getPost('fecha_fin');
        $genero = $this->request->getPost('genero');

        $mangaModel = new Manga();
        $data['mangas'] = $mangaModel->findAll();

        // Filtrar por fechas si se especificaron
        if (!empty($fecha_inicio) && !empty($fecha_fin)) {
            $data['mangas'] = $mangaModel->where('creado_en >=', $fecha_inicio)
                                        ->where('creado_en <=', $fecha_fin)
                                        ->findAll();
        }

        // Filtrar por género si se especificó
        if (!empty($genero) && $genero != 'todos') {
            $data['mangas'] = $mangaModel->where('genero', $genero)->findAll();
        }

        $data['titulo_reporte'] = $this->getTituloReporte($tipo);
        $data['fecha_generacion'] = date('d/m/Y H:i:s');

        // Configurar Dompdf
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);
        
        $dompdf = new Dompdf($options);
        $dompdf->setPaper('A4', 'portrait');

        // Cargar HTML
        $html = view('reportes/plantilla_pdf', $data);
        $dompdf->loadHtml($html);

        // Renderizar PDF
        $dompdf->render();

        // Descargar PDF
        $dompdf->stream('reporte_mangas.pdf', ['Attachment' => true]);
    }

    private function getTituloReporte($tipo)
    {
        $titulos = [
            'inventario' => 'Reporte de Inventario de Mangas',
            'precios' => 'Reporte de Precios de Mangas',
            'generos' => 'Reporte de Mangas por Género'
        ];

        return $titulos[$tipo] ?? 'Reporte de Mangas';
    }

    public function obtenerGeneros()
    {
        $mangaModel = new Manga();
        $generos = $mangaModel->distinct()->select('genero')->findAll();
        
        return $this->response->setJSON($generos);
    }
}