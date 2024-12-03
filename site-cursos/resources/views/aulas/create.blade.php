@extends('layouts.app')

@section('content')
<br><br>
<form action="{{ route('aulas.store') }}" method="POST" class="max-w-lg mx-auto p-6 bg-white rounded-lg shadow-md">
    @csrf
    <div class="mb-4">
        <label for="titulo" class="block text-sm font-medium text-gray-700">Id do Curso:</label>
        <input type="number" name="curso_id" value="{{$curso->id}}" required
            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
    </div>
    <!--<input type="number" name="curso_id" value="">  ID do curso -->

    <div class="mb-4">
        <label for="titulo" class="block text-sm font-medium text-gray-700">Título da Aula:</label>
        <input type="text" name="titulo" id="titulo" required
            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
    </div>

    <div class="mb-4">
        <label for="descricao" class="block text-sm font-medium text-gray-700">Conteudo:</label>
        <textarea name="conteudo" id="conteudo"
            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></textarea>
    </div>

    <div class="mb-4">
        <label for="video_url" class="block text-sm font-medium text-gray-700">URL do Vídeo:</label>
        <input type="url" name="video_url" id="video_url"
            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
    </div>

    <div class="mb-4">
        <label for="ordem" class="block text-sm font-medium text-gray-700">Ordem:</label>
        <input type="number" name="order" id="order" value="0"
            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
    </div>

    <button type="submit"
        class="w-full px-4 py-2 bg-indigo-600 text-white font-medium text-sm leading-5 rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
        Salvar Aula
    </button>
</form>


@endsection
