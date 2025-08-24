<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Manga;

class MangaController extends BaseController
{
    // LISTAR
    public function index(): string
    {
        $manga = new Manga();
        $datos['mangas'] = $manga->orderBy('id', 'ASC')->findAll();

        $datos['header'] = view('Layouts/header');
        $datos['footer'] = view('Layouts/footer');

        return view('mangas/listar', $datos);
    }

    // FORMULARIO CREAR
    public function crear(): string
    {
        $datos['header'] = view('Layouts/header');
        $datos['footer'] = view('Layouts/footer');

        return view('mangas/crear', $datos);
    }

    // FORMULARIO EDITAR
    public function editar($id = null): string
    {
        $manga = new Manga();
        $datos['manga'] = $manga->where('id', $id)->first();

        $datos['header'] = view('Layouts/header');
        $datos['footer'] = view('Layouts/footer');

        return view('mangas/editar', $datos);
    }

    // GUARDAR NUEVO
    public function guardar()
    {
        $manga = new Manga();

        $titulo = $this->request->getVar('titulo');
        $descripcion = $this->request->getVar('descripcion');
        $genero = $this->request->getVar('genero');
        $precio = $this->request->getVar('precio');

        if ($imagen = $this->request->getFile('imagen')) {
            if ($imagen->isValid() && !$imagen->hasMoved()) {
                $nuevoNombre = $imagen->getRandomName();
                $imagen->move('../public/uploads/', $nuevoNombre);

                $registro = [
                    'titulo' => $titulo,
                    'descripcion' => $descripcion,
                    'genero' => $genero,
                    'precio' => $precio,
                    'imagen' => $nuevoNombre
                ];

                $manga->insert($registro);
            }
        }

        return $this->response->redirect(base_url('mangas'));
    }

    // ACTUALIZAR
    public function actualizar($id = null)
    {
        $manga = new Manga();

        $titulo = $this->request->getVar('titulo');
        $descripcion = $this->request->getVar('descripcion');
        $genero = $this->request->getVar('genero');
        $precio = $this->request->getVar('precio');

        $datosActualizados = [
            'titulo' => $titulo,
            'descripcion' => $descripcion,
            'genero' => $genero,
            'precio' => $precio,
        ];

        if ($imagen = $this->request->getFile('imagen')) {
            if ($imagen->isValid() && !$imagen->hasMoved()) {
                $nuevoNombre = $imagen->getRandomName();
                $imagen->move('../public/uploads/', $nuevoNombre);
                $datosActualizados['imagen'] = $nuevoNombre;
            }
        }

        $manga->update($id, $datosActualizados);

        return $this->response->redirect(base_url('mangas'));
    }

    // ELIMINAR
    public function eliminar($id = null)
    {
        $manga = new Manga();
        $manga->delete($id);

        return $this->response->redirect(base_url('mangas'));
    }
}
