@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold text-gray-800 mb-6 text-center text-white">Atualizar Aula</h1>

    <form action="{{ route('aulas.update', $aula->id) }}" method="POST" class="max-w-2xl mx-auto p-6 bg-white rounded-lg shadow-md">
        @csrf
        @method('PUT')

        <!-- ID do Curso -->
        <div class="mb-4">
            <label for="curso_id" class="block text-sm font-medium text-gray-700">ID do Curso:</label>
            <input type="number" name="curso_id" value="{{ $aula->curso_id }}" required
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" readonly>
        </div>

        <!-- Título da Aula -->
        <div class="mb-4">
            <label for="titulo" class="block text-sm font-medium text-gray-700">Título da Aula:</label>
            <input type="text" name="titulo" id="titulo" value="{{ $aula->titulo }}" required
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        </div>

        <!-- Conteúdo -->
        <div class="mb-4">
            <label for="conteudo" class="block text-sm font-medium text-gray-700">Conteúdo:</label>
            <textarea name="conteudo" id="conteudo" rows="4" required
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">{{ $aula->conteudo }}</textarea>
        </div>

        <!-- URL do Vídeo -->
        <div class="mb-4">
            <label for="video_url" class="block text-sm font-medium text-gray-700">URL do Vídeo:</label>
            <input type="url" name="video_url" id="video_url" value="{{ $aula->video_url }}"
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        </div>

        <!-- Ordem -->
        <div class="mb-4">
            <label for="order" class="block text-sm font-medium text-gray-700">Ordem:</label>
            <input type="number" name="order" id="order" value="{{ $aula->order }}"
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        </div>

        <!-- Botão de Atualização -->
        <button type="submit"
            class="w-full px-4 py-2 bg-indigo-600 text-white font-medium text-sm leading-5 rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            Atualizar Aula
        </button>
    </form>
</div>
@endsection
