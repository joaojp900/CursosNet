<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function dashboard(){
        //Aqui você pode buscar informações especificas para i aluno logado.
        $cursos = auth()->user()->cursos; // Exemplo: se o aluno tem relação com curso

        return view('alunos.dashboard',compact('cursos'));
    }
}
