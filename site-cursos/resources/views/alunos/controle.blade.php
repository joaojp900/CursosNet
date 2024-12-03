@extends('layouts.app')

@section('content')
    <div class="max-w-6xl mx-auto mt-10 shadow-lg rounded-lg bg-white">
        <div class="p-6">
            <h2 class="text-2xl font-bold text-gray-800">Alunos do Curso: {{ $curso->nome }}</h2>
            <ul class="mt-4">
                @foreach($alunos as $aluno)
                    <li class="py-2 border-b">
                        {{ $aluno->name }} ({{ $aluno->email }})
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
