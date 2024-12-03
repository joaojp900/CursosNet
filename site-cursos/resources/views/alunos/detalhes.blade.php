@extends('layouts.app')

@section('content')
<br><br>
<div class="max-w-xl mx-auto p-6 bg-white rounded-lg shadow-md">
    <h1 class="text-2xl font-bold text-gray-800 mb-4 text-center">{{ $cursos->titulo }}</h1>
    <p class="text-gray-600 mb-2">{{ $cursos->descricao }}</p>
    

    @if ($cursos->imagem)
        <img src="{{ asset('storage/' . $cursos->imagem) }}" alt="{{ $cursos->titulo }}" class="w-full max-w-sm rounded-md shadow-md mb-4">
    @endif

   
</div>
<!--Mostrar quantas aulas tem o curso-->

<div class="max-w-screen-lg mx-auto p-6">
    <h2 class="text-2xl font-bold text-gray-800 mb-6 text-white">Aulas do Curso: {{ $cursos->titulo }}</h2>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200 rounded-lg">
            <thead>
                <tr class="bg-gray-100">
                    <th class="py-3 px-6 text-left font-medium text-gray-600">Título</th>
                    <th class="py-3 px-6 text-left font-medium text-gray-600">Descrição</th>
                    <th class="py-3 px-6 text-center font-medium text-gray-600">Ordem</th>
                     
                </tr>
            </thead>
            <tbody>
                @forelse ($aulas as $aula)
                    <tr class="border-t hover:bg-gray-50">
                        <td class="py-3 px-6 text-gray-800">{{ $aula->titulo}}</td>
                        <td class="py-3 px-6 text-gray-600">{{ Str::limit($aula->conteudo, 50) }}</td>
                        <td class="py-3 px-6 text-center text-gray-800">{{ $aula->order }}</td>
                        
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="py-3 px-6 text-center text-gray-600">
                            Nenhuma aula vinculada a este curso.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
