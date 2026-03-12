<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    public function index()
    {
        $materias = [
            (object)['nombre' => 'Inteligencia Artificial', 'clave' => 'IA-01'],
            (object)['nombre' => 'Ingeniería de Software', 'clave' => 'IS-02'],
            (object)['nombre' => 'Redes de Computadoras', 'clave' => 'RC-03'],
        ];

        return view('dashboard.materias', compact('materias'));
    }
}
