@extends('layouts.app')

@section('content')
<br><br>
<div class="max-w-xl mx-auto p-6 bg-white rounded-lg shadow-md">
    <h1 class="text-2xl font-bold text-gray-800 mb-4">{{ $curso->titulo }}</h1>
    <p class="text-gray-600 mb-2">{{ $curso->descricao }}</p>
    <p class="text-lg text-gray-800 font-medium mb-4">
        Preço: R$ {{ number_format($curso->preco, 2, ',', '.') }}
    </p>

    @if ($curso->imagem)
        <img src="{{ asset('storage/' . $curso->imagem) }}" alt="{{ $curso->titulo }}" class="w-full max-w-sm rounded-md shadow-md mb-4">
    @endif

    <a href="{{ route('cursos.index') }}"
        class="inline-block px-4 py-2 bg-indigo-600 text-white font-medium text-sm leading-5 rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
        Voltar
    </a>
</div>
<!--Mostrar quantas aulas tem o curso-->

<div class="max-w-screen-lg mx-auto p-6">
    <h2 class="text-2xl font-bold text-gray-800 mb-6 text-white">Aulas do Curso: {{ $curso->titulo }}</h2>

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
                        <td class="py-3 px-6 text-gray-800">{{ $aula->titulo }}</td>
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
