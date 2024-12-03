@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-10">
    <h1 class="text-3xl font-bold mb-6 text-black">Minhas Aulas</h1>

  

    <div class="overflow-x-auto">
        <table class="w-full border-collapse bg-gray-800 rounded-lg shadow-lg">
            <thead>
                <tr class="bg-gray-700 text-gray-300">
                    
                     
                    <th class="py-3 px-4 text-center">Titulo da Aula</th>
                    <th class="py-3 px-4 text-center">conteudo</th>
                    <th class="py-3 px-4 text-center">Ordem</th>
                    <th class="py-3 px-4 text-center">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($aulas as $aula)
                
                
                <tr class="border-t border-gray-700 hover:bg-gray-600">
                    <td class="py-3 px-4 text-white">{{ $aula->titulo}}</td>
                   
                     
                    <td class="py-3 px-4 text-white"> {{$aula->conteudo }}</td>
                    <td class="py-3 px-4 text-white"> {{$aula->order }}</td>
                    <td class="py-3 px-4">
                        <div class="flex items-center space-x-2">
                            <a href="{{route('aulas.visualizar',['aulas' => $aula->id])}}" class="bg-green-400 hover:bg-green-500 text-white text-sm font-medium py-1 px-3 rounded">
                                Visualizar Aula
                            </a>
                             
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
