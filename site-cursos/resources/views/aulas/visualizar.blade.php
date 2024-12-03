@extends('layouts.app')

@section('content')

<body class="bg-gray-100 font-sans">
    <div class="max-w-6xl mx-auto mt-10 shadow-lg rounded-lg bg-white overflow-hidden">
        <!-- Layout Geral -->
        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Conteúdo Principal -->
            <div class="lg:w-3/4 w-full">
                <!-- Cabeçalho -->
                <div class="bg-gradient-to-r from-blue-500 to-blue-700 text-white text-center py-8 rounded-t-lg shadow-md">
                    <h1 class="text-4xl font-extrabold">{{ $aulas->titulo }}</h1>
                </div>

                <!-- Conteúdo da Aula -->
                <div class="p-8">
                    <p class="text-gray-700 mb-8 text-lg leading-relaxed">{{ $aulas->conteudo }}</p>

                    <!-- Vídeo da Aula -->
                    <div class="relative rounded-lg overflow-hidden shadow-lg" style="padding-top: 56.25%;">
                        <iframe 
                            src="https://www.youtube.com/embed/{{ $aulas->video_url }}" 
                            class="absolute top-0 left-0 w-full h-full rounded-lg" 
                            frameborder="0" 
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                            allowfullscreen>
                        </iframe>
                    </div>
                </div>
            </div>

            <!-- Aulas Restantes -->
            <div class="lg:w-1/4 w-full bg-gray-100 p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-bold text-gray-800 mb-6 border-b pb-3 text-center">Aulas Restantes</h2>
                <ul class="space-y-4">
                    @foreach ($aulasRestantes as $aula)
                        <li class="bg-white rounded-lg shadow p-4 hover:bg-blue-50 cursor-pointer transition duration-200">
                            <a href="{{ route('aulas.visualizar', $aula->id) }}" class="flex justify-between items-center">
                                <div>
                                    <strong class="text-gray-900 text-lg">{{ $aula->titulo }}</strong>
                                    <p class="text-sm text-gray-600 mt-1">{{ $aula->descricao }}</p>
                                </div>
                                <!-- Marcação de conclusão -->
                                @if (auth()->user()->aulas()->where('aula_id', $aula->id)->exists())
                                    <span class="text-green-500">
                                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                        </svg>
                                    </span>
                                @endif
                            </a>
                        </li>
                    @endforeach
                </ul>
                
            </div>
            
        </div>

      
         
    </div>
    <div class="text-center mt-8">
        <a href="{{ route('certificado.gerar', $aulas->curso_id) }}" class="inline-block bg-green-500 hover:bg-green-600 text-white font-bold py-3 px-6 rounded-lg shadow transition duration-200">
            Gerar Certificado
        </a>
    </div>
    
</body>

@endsection
