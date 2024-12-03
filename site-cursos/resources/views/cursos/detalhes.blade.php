<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CursoNet</title>
    <link rel="shortcut icon" href="{{asset('img/cursoc.png')}}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<!--Navbar-->
<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
    <div class="container">
      <a class="navbar-brand" href="home">
        <img src="{{ asset('img/cursoc.png') }}" alt="Logo" style="width: 35px;"> 
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav me-auto">
           
          <li class="nav-item"><a class="nav-link" href="{{route('cursos.home')}}">Cursos</a></li>
          <li class="nav-item"><a class="nav-link" href="novidades">Novidades</a></li>
          <li class="nav-item"><a class="nav-link" href="duvidas">Duvidas </a></li>
        </ul>
        @if(Auth::check() && Auth::user()->role === 'student')
        <a class="btn btn-dark me-2" href="{{route('dashboard.alunos')}}">{{ Auth::user()->name }}</a>
    @elseif(Auth::check() && Auth::user()->role === 'admin') 
        <a class="btn btn-dark me-2" href="{{ route('login') }}">{{ Auth::user()->name }}</a>    
    @else
      <a class="btn btn-dark me-2" href="{{ route('login') }}">Login</a>
    @endif
        @guest
        <a href="register" class="btn btn-primary">Cadastre-se</a>
        @endguest
        
      </div>
    </div>
  </nav> 
 <!--Carrosel-->
   
</header>
<br><br><br>
<div class="container my-5">
    <!-- Detalhes do Curso -->
    <div class="card shadow-lg">
        <div class="card-body text-center">
            <h1 class="card-title display-4 mb-4">{{ $curso->titulo }}</h1>
        
            @if ($curso->imagem)
                <img 
                    src="{{ asset('storage/' . $curso->imagem) }}" 
                    alt="{{ $curso->titulo }}" 
                    class="img-fluid rounded shadow-sm mb-4" 
                    style="max-height: 300px; object-fit: cover;"
                >
            @endif
            <p class="h4 text-primary font-weight-bold mb-4">
                Preço: R$ <del> {{ number_format($curso->preco, 2, ',', '.') }}</del>
            </p>
            <p class="card-text text-muted mb-4">{{ $curso->descricao }}</p>
            
        </div>
    </div>

    <!-- Aulas do Curso -->
    <div class="card shadow-lg mt-5">
        <div class="card-header bg-primary text-white text-center">
            <h2 class="mb-0">Aulas do Curso: {{ $curso->titulo }}</h2>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Título</th>
                            <th scope="col">Descrição</th>
                            <th scope="col" class="text-center">Ordem</th>
                         
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($aulas as $aula)
                            <tr>
                                <td>{{ $aula->titulo }}</td>
                                <td>{{ Str::limit($aula->conteudo, 50) }}</td>
                                <td class="text-center">{{ $aula->order }}</td>
                            
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted py-4">
                                    Nenhuma aula vinculada a este curso.
                                </td>
                            </tr>
                        @endforelse
                        
                    </tbody>
                </table>
            </div>
        </div>        
    </div>
    <br><br>
    @if(auth()->check() && !auth()->user()->cursos->contains($curso))
    <form action="{{ route('cursos.inscrever', $curso->id) }}" method="POST" class="mt-3">
        @csrf
        <button type="submit" class="btn btn-lg btn-success w-100">
            Inscrever-se
        </button>
    </form>
@elseif(auth()->check())
    <div class="alert alert-info mt-3" role="alert">
        Você já está inscrito neste curso.
    </div>
@else
    <!-- Quando o usuário não está logado, redireciona para login -->
    <a href="{{ route('register') }}" class="btn btn-lg btn-warning w-100">
        Você precisa estar ter conta para se inscrever. Clique aqui para fazer uma conta.
    </a>
@endif


</div>
 

</body>
</html>