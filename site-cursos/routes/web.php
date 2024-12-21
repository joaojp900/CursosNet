<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AulaController;
 
use App\Http\Controllers\CursoController;
use App\Http\Controllers\StudentController;
use Spatie\Permission\Contracts\Role;

Route::get('/home', function () {
    return view('welcome');
});

Route::get('/dashboard', function(){
    return view('dashboard');
})->name('dashboard');

 
Route::get('novidades', function(){
    return view('cursos.novidades');
});

Route::get('duvidas', function(){
    return view('cursos.duvidas');
});
 
 //Para abrir os cursos disponiveis
Route::get('/disponiveis', [CursoController::class, 'cursos'])->name('cursos.home');
//Ver mais
Route::get('/detalhes{curso}', [CursoController::class, 'detalhes'])->name('cursos.detalhes');
 
//configuração do usuario
Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


 //Aluno
Route::middleware('student')->group(function(){
//Sair do curso
Route::delete('/curso/{cursoId}/desinscrever', [CursoController::class, 'desinscrever'])->name('curso.desinscrever');
//Certificado 
Route::get('/certificado/{courseId}', [CursoController::class, 'gerarCertificado'])->name('certificado.gerar');
 //Ver Aula
 Route::get('aulas/visualizar{aulas}', [AulaController::class, 'visualizar'])->name('aulas.visualizar');
//Detalhes cursos
 Route::get('aulas{cursos}', [AulaController::class, 'detalhes'])->name('detalhes.alunos');   
//Minhas Aulas
Route::get('myaulas', [AulaController::class,'minhas_aulas'])->name('minhas.aulas');
//Dashboard
Route::get('/dashboard/alunos', [AulaController::class, 'dashboard'])->name('dashboard.alunos');
 //Visualizar Cursos
 Route::get('aulas/visualizar{aulas}', [AulaController::class, 'visualizar'])->name('aulas.visualizar');
//Cursos inscritos  
Route::get('/mycursos', [CursoController::class, 'meusCursos'])->name('cursos.meus');
//Matricular nos cursos
Route::post('/cursos/{curso}/inscrever', [CursoController::class, 'inscrever'])->name('cursos.inscrever');
});

//Adm
Route::middleware('admin')->group(function () {
    //Coisas do Curso so Para o adm
     Route::get('controle/curso/{id}', [CursoController::class, 'controleAlunos'])->name('alunos.controle'); 
     Route::get('cursos', [CursoController::class,'index'])->name('cursos.index');
     Route::get('cursos{curso}', [CursoController::class, 'show'])->name('cursos.show');
     Route::get('cursos/create',[CursoController::class,'create'])->name('cursos.create');
     Route::post('cursos', [CursoController::class, 'store'])->name('cursos.store');
     Route::get('cursos/{curso}/edit', [CursoController::class, 'edit'])->name('cursos.edit');
     Route::put('cursos/{curso}', [CursoController::class,'update'])->name('cursos.update');
     Route::delete('cursos{curso}',[CursoController::class, 'destroy'])->name('cursos.destroy');
     Route::resource('aulas', AulaController::class);
    
});

require __DIR__.'/auth.php';
