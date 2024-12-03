@extends('layouts.app')

  
@section('content')
      
  
<div class="max-w-3xl mx-auto mt-10 bg-white p-8 shadow-md rounded-lg">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Criar Novo Curso</h1>
    
    <form action="{{ route('cursos.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        
        <!-- Título -->
        <div>
            <label for="titulo" class="block text-sm font-medium text-gray-700">Título:</label>
            <input 
                type="text" 
                name="titulo" 
                id="titulo" 
                value="{{ old('titulo') }}" 
                required
                class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
            >
        </div>
        
        <!-- Descrição -->
        <div>
            <label for="descricao" class="block text-sm font-medium text-gray-700">Descrição:</label>
            <textarea 
                name="descricao" 
                id="descricao" 
                rows="4"
                class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
            >{{ old('descricao') }}</textarea>
        </div>
        
        <!-- Preço -->
        <div>
            <label for="preco" class="block text-sm font-medium text-gray-700">Preço:</label>
            <input 
                type="number" 
                name="preco" 
                id="preco" 
                value="{{ old('preco') }}" 
                required
                class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
            >
        </div>
        
        <!-- Imagem -->
        <div>
            <label for="imagem" class="block text-sm font-medium text-gray-700">Imagem:</label>
            <input 
                type="file" 
                name="imagem" 
                id="imagem"
                class="mt-1 block w-full text-sm text-gray-600 file:mr-4 file:py-2 file:px-4 file:border file:border-gray-300 file:rounded-md file:text-sm file:bg-gray-50 hover:file:bg-gray-100"
            >
        </div>
        
        <!-- Botão de Enviar -->
        <div>
            <button 
                type="submit" 
                class="w-full bg-indigo-600 text-white font-medium py-2 px-4 rounded-md hover:bg-indigo-700 focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
            >
                Salvar
            </button>
        </div>
    </form>
</div>
@endsection
