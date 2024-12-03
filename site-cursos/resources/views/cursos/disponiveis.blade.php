<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CursoNet</title>
    <link rel="shortcut icon" href="{{asset('img/cursoc.png')}}" type="image/x-icon">
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

<div class="container py-5">
  <h2 class="text-center mb-5" style="color: #007BFF;">Cursos Disponíveis</h2>

    <div class="row">
        @foreach ($cursos as $curso)
            <div class="col-12 col-sm-6 col-lg-4 mb-4">
                <div class="card h-100 shadow-sm">
                    @if ($curso->imagem)
                        <img 
                            src="{{ asset('storage/' . $curso->imagem) }}" 
                            class="card-img-top" 
                            alt="{{ $curso->titulo }}" 
                            style="height: 200px; object-fit: cover;"
                        >
                    @endif
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title text-truncate">{{ $curso->titulo }}</h5>
                        <p class="card-text text-muted">
                            {{ Str::limit($curso->descricao, 200) }}
                        </p>
                        <p class="mt-auto font-weight-bold text-center">
                            Preço: R$ <del>{{ number_format($curso->preco, 2, ',', '.') }}</del>  
                        </p>
                        <a href="{{ route('cursos.detalhes', $curso->id) }}" 
                            class="btn btn-primary mt-3">
                            Ver Detalhes
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
<br><br>
<!-- Footer -->
<div footer class="bg-light py-5 text-black">
    <div class="container">
      <hr class="hr hr-blurry">
      <div class="row text-center text-md-start">
        <div class="col-md-4 mb-4">
          <h6 class="fw-bold">Termos de Uso</h6>
          <ul class="list-unstyled">
            <li><a href="#" class="text-muted text-decoration-none">Regras para navegação e uso da plataforma</a></li>
            <li><a href="#" class="text-muted text-decoration-none">Política de compra e reembolso</a></li>
          </ul>
        </div>
        <div class="col-md-4 mb-4">
          <h6 class="fw-bold">Política de Privacidade</h6>
          <ul class="list-unstyled">
            <li><a href="#" class="text-muted text-decoration-none">Como os seus dados são coletados, armazenados e protegidos</a></li>
          </ul>
        </div>
        <div class="col-md-4 mb-4">
          <h6 class="fw-bold">Contato</h6>
          <p class="text-muted mb-1">Email: <a href="mailto:1234@gmail.com" class="text-muted text-decoration-none">1234@gmail.com</a></p>
          <p class="text-muted mb-1">Whatsapp: <a href="tel:+55111234567890" class="text-muted text-decoration-none">(11) 12345-67890</a></p>
        </div>
      </div>
  
      <div class="row mt-4 align-items-center">
        <div class="col-md-6 text-center text-md-start">
          <p class="mb-0">&copy; 2024 CursoNet. Todos os direitos reservados.</p>
        </div>
        <div class="col-md-6 text-center text-md-end">
          <a href="#" class="text-muted me-3"><i class="bi bi-facebook fs-5"></i></a>
          <a href="#" class="text-muted me-3"><i class="bi bi-linkedin fs-5"></i></a>
          <a href="#" class="text-muted me-3"><i class="bi bi-twitter fs-5"></i></a>
          <a href="#" class="text-muted me-3"><i class="bi bi-youtube fs-5"></i></a>
          <a href="#" class="text-muted"><i class="bi bi-instagram fs-5"></i></a>
        </div>
      </div>
    </div>
  </div>
