<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Curso $curso){
        $aulas = $curso->aulas;
        
        return view('cursos.disponiveis', compact('curso', 'aulas'));
    }
}
