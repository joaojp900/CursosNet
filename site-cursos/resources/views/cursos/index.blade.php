@extends('layouts.app')

@section('content')
 
<div class="container mx-auto mt-10">
    <h1 class="text-3xl font-bold mb-6 text-black">Lista de Cursos</h1>

    <div class="mb-4">
        <a href="{{ route('cursos.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-4 rounded">
            Criar Novo Curso
        </a>
    </div>
    <br>

    
    <div class="overflow-x-auto">
        <table class="w-full border-collapse bg-gray-800 rounded-lg shadow-lg">
            <thead>
                <tr class="bg-gray-700 text-gray-300">
                    <th class="py-3 px-4 text-left">Título</th>
                    <th class="py-3 px-4 text-left">Preço</th>
                    <th class="py-3 px-4 text-left">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cursos as $curso)
                <tr class="border-t border-gray-700 hover:bg-gray-600">
                    <td class="py-3 px-4 text-white">{{ $curso->titulo }}</td>
                    <td class="py-3 px-4 text-white">R$ {{ number_format($curso->preco, 2, ',', '.') }}</td>
                    <td class="py-3 px-4">
                        <div class="flex items-center space-x-2">
                            <a href="{{ route('alunos.controle', $curso) }}" class="bg-green-400 hover:bg-green-500 text-white text-sm font-medium py-1 px-3 rounded">
                                Quant Alunos
                            </a>
                            <a href="{{ route('cursos.show', $curso) }}" class="bg-blue-400 hover:bg-blue-500 text-white text-sm font-medium py-1 px-3 rounded">
                                Detalhes
                            </a>
                            <a href="{{ route('cursos.edit', $curso) }}" class="bg-yellow-400 hover:bg-yellow-500 text-white text-sm font-medium py-1 px-3 rounded">
                                Editar
                            </a>
                            <form action="{{ route('cursos.destroy', $curso) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white text-sm font-medium py-1 px-3 rounded">
                                    Excluir
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
