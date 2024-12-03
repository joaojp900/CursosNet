@extends('layouts.app')  

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <h1 class="text-2xl font-bold mb-2">Bem-vindo de volta,   {{Auth::user()->name }} !</h1>
                <p class="text-lg">É ótimo ter você de volta! Explore seus cursos, aproveite ao máximo as aulas, acompanhe seu progresso e continue avançando em sua jornada de aprendizado. Estamos aqui para apoiar você em cada etapa do caminho.</p>
            </div>
        </div>
    </div>
</div>
@endsection
