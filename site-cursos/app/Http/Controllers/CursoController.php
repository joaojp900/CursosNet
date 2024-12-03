<?php

namespace App\Http\Controllers;

use App\Models\Aula;
use App\Models\Curso;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class CursoController extends Controller
{
        public function gerarCertificado($curso_id){

            $user = auth()->user();
            $curso = Curso::findOrFail($curso_id);

            $userCursos = DB::table('curso_user')
            ->where('user_id', $user->id)
            ->where('curso_id', $curso_id)
            ->whereNull('completed_at')
            ->first();

            $pdf = Pdf::loadView('cursos.certificado', [
                'user' => $user,
                'curso' => $curso,
                'completedAt' => $userCursos->completed_at,
                 
            ]);

            return $pdf->download('certificado-'.$curso->slug. '.pdf');

        }


    public function controleAlunos($cursoId){

        $curso = Curso::findOrFail($cursoId);

    // Obter todos os usuários inscritos no curso
    $alunos = $curso->usuarios;  

     
    return view('alunos.controle', compact('curso', 'alunos'));
 }

    public function meusCursos(){
        $cursos = auth()->user()->cursos;
        return view('alunos.cursos', compact('cursos'));
    }

        public function detalhes(Curso $curso){

            $aulas = $curso->aulas()->orderBy('order')->get();

            return view('cursos.detalhes', compact('curso','aulas'));
        }

     
    public function inscrever($cursoId){
        $curso = Curso::findOrFail($cursoId);
        $user = auth()->user(); //Usuário autenticado

        
        if(!$user->cursos->contains($cursoId)){
            $user->cursos()->attach($curso);
            return redirect()->back()->with('success', 'Você foi inscrito no curso com sucesso!');
        }
        return redirect()->back()->with('error', 'Você já está inscrito neste curso.');
    }

    public function desinscrever($cursoId)
    {
    $cursos = auth()->user()->cursos;
    $user = auth()->user();
    $user->cursos()->detach($cursoId); // Remove a relação entre o usuário e o curso

    return view('alunos.dashboard', ['cursoId' => $cursoId, 'cursos' => $cursos]);

    }



  public function cursos(){

    $cursos = Curso::all();

    return view('cursos.disponiveis', compact('cursos'));
  }

    public function index()
    {
        $cursos = Curso::all();
        return view('cursos.index', compact('cursos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cursos.create');
     }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $regras = [
            'titulo' => 'required|string|max:35',
            'descricao' => 'nullable:string',
            'preco' => 'required|numeric|min:0',
            'imagem' => 'nullable|image|max:2048'
        ];

        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido',
        ];

        $request->validate($regras,$feedback);

        $curso = new Curso($request->all());

        if($request->hasFile('imagem')){
            $curso->imagem = $request->file('imagem')->store('cursos', 'public');
        }

        $curso->save();

        return redirect()->route('cursos.index')->with('Sucess', 'Curso criado com sucesso!');

    }

    /**
     * Display the specified resource.
     */
    public function show(Curso $curso)
    {
          $aulas = $curso->aulas()->orderBy('order')->get();

        return view('cursos.show', compact('curso','aulas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Curso $curso)
    {
         
        return view('cursos.edit', compact('curso'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Curso $curso)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'preco' => 'required|numeric|min:0',
            'imagem' => 'nullable|image|max:2048',
        ]);

        $curso->fill($request->all());

        if ($request->hasFile('imagem')) {
            $curso->imagem = $request->file('imagem')->store('cursos', 'public');
        }

        $curso->save();

        return redirect()->route('cursos.index')->with('success', 'Curso atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Curso $curso)
    {
        $curso->delete();
        return redirect()->route('cursos.index')->with('success', 'Curso excluído com sucesso!');
    }
}
