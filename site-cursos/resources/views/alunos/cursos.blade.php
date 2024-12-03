@extends('layouts.app')

@section('content')

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <h1 class="text-3xl font-bold mb-6">Meus Cursos</h1>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($cursos as $curso)
                        <div class="bg-white border border-gray-200 rounded-lg shadow-lg overflow-hidden flex flex-col">
                            <!-- Imagem do curso -->
                            @if ($curso->imagem)
                                <img 
                                    src="{{ asset('storage/' . $curso->imagem) }}" 
                                    class="w-full h-48 object-cover" 
                                    alt="{{ $curso->titulo }}"
                                >
                            @else
                                <div class="bg-gray-200 h-48 flex items-center justify-center">
                                    <span class="text-gray-500">Sem imagem disponível</span>
                                </div>
                            @endif
                            
                            <!-- Conteúdo do curso -->
                            <div class="p-4 flex-1">
                                <h2 class="text-xl font-semibold mb-2 text-black text-center">{{ $curso->titulo }}</h2>
                                <p class="text-gray-600 mb-4 text-center">{{ Str::limit($curso->descricao, 100) }}</p>
                                <button  class="w-full inline-block bg-blue-500 hover:bg-blue-600 text-white font-bold py-3 px-6 rounded-lg shadow transition duration-200">
                                    <a href="{{ route('detalhes.alunos', $curso->id) }}">Ver Curso</a>
                                </button>
                                 
                            </div>
                            <div class="p-4 flex-1">
                                <form action="{{ route('curso.desinscrever', $curso->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="w-full inline-block bg-red-500 hover:bg-red-600 text-white font-bold py-3 px-6 rounded-lg shadow transition duration-200">
                                        Cancelar Inscrição
                                    </button>
                                </form>
                                
                             
                            </div>
                            <!-- Botão de desinscrição -->
                            
                                 
                             
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
