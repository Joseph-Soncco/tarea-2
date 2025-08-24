<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        //Solicitamos las secciones:HEADER y FOOTER
        $datos['header'] = view('Layouts/header');
        $datos['footer'] = view('Layouts/footer');
        //return view('welcome_message');
        return view('welcome', $datos);
    }
}
