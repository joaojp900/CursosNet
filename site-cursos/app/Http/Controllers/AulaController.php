<?php

namespace App\Http\Controllers;

use App\Models\Aula;
use App\Models\Curso;
use Illuminate\Http\Request;

class AulaController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function detalhes(Curso $cursos){

        $aulas = $cursos->aulas()->orderBy('order')->get();

    return view('alunos.detalhes', compact('aulas', 'cursos'));
    }


    public function minhas_aulas(Curso $cursos){
        

         $cursos = auth()->user()->cursos;

         $aulas = $cursos->flatMap->aulas;

        return view('alunos.aulas', compact('aulas', 'cursos'));
    }

    public function dashboard(){
        return view('alunos.dashboard');
    }

    //Acessar as aulas
    public function visualizar($id){
            //Ta retornando os videos em seguida
    $aulas = Aula::findOrFail($id);
    $aulasRestantes = Aula::where('curso_id', $aulas->curso_id)
        ->where('id', '!=', $id)
        ->get();

        $isConcluida = $aulas->usuarios()->where('user_id', auth()->id())->exists();

      return view('aulas.visualizar', compact('aulasRestantes', 'aulas','isConcluida'));
    }



    public function index(Curso $curso)
    {
        
        $aulas = Aula::all();
        return view('aulas.index', compact('curso', 'aulas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Curso $curso)
    {
        return view('aulas.create', compact('curso'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Curso $curso)
    {
        $regras = [
            'curso_id' => 'required|exists:cursos,id', //O curso precisa existir
            'titulo' => 'required|string|max:7000', //Titulo obrigatório
            'conteudo' => 'required|string|max:7000',
            'video_url' => 'nullable|url', // Url do video opcional
            'order' => 'nullable|integer' //Ordem opcionaç
        ];

        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido'
        ];

         $request->validate($regras, $feedback);

         $aula = new Aula($request->all());

         $aula->save();

        return redirect('aulas');
    }

    /**
     * Display the specified resource.
     */
    public function show(Curso $curso, Aula $aula)
    {
        return view('aulas.show', compact('curso', 'aula'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Curso $curso, Aula $aula)
    {
        
        return view('aulas.edit', compact('curso', 'aula'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Curso $curso, Aula $aula)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'conteudo' => 'nullable|string',
            'video_url' => 'nullable|url'
        ]);

        $aula->update($request->all());

    return redirect()->route('aulas.index', $curso)->with('sucess', 'Aula atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Curso $curso, Aula $aula)
    {
        
        $aula->delete();

        return view('dashboard', $curso) ;
    }
}
