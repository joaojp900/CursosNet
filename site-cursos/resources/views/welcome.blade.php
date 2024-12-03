<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Loja de Cursos</title>
  <link rel="shortcut icon" href="{{asset('img/cursoc.png')}}" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    @media screen and (min-width: 992px) {
      .banner {
        height: 40vh;
      }
      .banner-conteudo {
        margin-top: 5vh;
      }
       
    }
  </style>
</head>
<body>
  <!-- Header -->
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
          <li class="nav-item"><a class="nav-link" href="duvidas">Contatos </a></li>
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

  <!-- Carrosel -->
  
  <div id="carouselExampleIndicators" class="carousel slide">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="{{asset('img/black.png')}}" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="{{asset('img/post.png')}}" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="{{asset('img/post2.png')}}" class="d-block w-100" alt="...">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
   

  <!-- Vantagens -->
  <div class="container my-5">
    <div class="text-start mb-4">
      <h2 class="fw-bold" style="color: #007BFF; text-align:center">Vantagens exclusivas para você</h2>
    </div>
    <div class="row">
      <div class="col-md-6 mb-3">
        <div class="bg-primary text-white p-4 rounded">
          <p>🎓 Certificados reconhecidos</p>
          <p>💻 Aulas 100% online</p>
          <p>⏳ Aprenda no seu tempo</p>
        </div>
      </div>
      <div class="col-md-6 mb-3">
        <div class="bg-primary text-white p-4 rounded">
          <p>📚 Conteúdo atualizado com o mercado</p>
          <p>🤝 Suporte de especialistas</p>
          <p>🌟 Acesso vitalício aos cursos</p>
        </div>
      </div>
    </div>
  </div>

  
 <!-- Cursos Populares -->
 <div class="container my-5">
  <h2 class="text-center fw-bold mb-4 text-primary">Cursos Populares</h2>
  <div class="row">
      <div class="col-md-4 mb-4">
          <div class="card shadow">
              <img src="{{asset('img/fortune.jpg')}}" class="card-img-top" alt="Imagem do Curso Como Faturar no Fortune Tiger" style="height: 500px; object-fit: cover;">
              <div class="card-body">
                  <h5 class="card-title">Como Faturar no Fortune Tiger</h5>
                  <p class="card-text text-center"><del>R$ 20</del></p>
                  <div class="text-center mt-3">
                    <a href="disponiveis" class="btn btn-outline-primary">Ver cursos populares</a>
                </div>
              </div>
          </div>
      </div>
      <div class="col-md-4 mb-4">
          <div class="card shadow">
              <img src="{{asset('img/culinaria.jpg')}}" class="card-img-top" alt="Imagem do Curso Design" style="height: 500px; object-fit: cover;">
              <div class="card-body">
                  <h5 class="card-title">Culinaria Básica</h5>
                  <p class="card-text text-center"><del>R$ 29</del></p>
                  <div class="text-center mt-3">
                    <a href="disponiveis" class="btn btn-outline-primary">Ver cursos populares</a>
                </div>
              </div>
          </div>
      </div>
      <div class="col-md-4 mb-4">
          <div class="card shadow">
              <img src="{{asset('img/ingles.jpg')}}" class="card-img-top" alt="Imagem do Curso Programação" style="height: 500px; object-fit: cover;">
              <div class="card-body">
                  <h5 class="card-title">Curso de Ingles</h5>
                  <p class="card-text text-center"><del>R$ 25</del></p>
                  <div class="text-center mt-3">
                    <a href="disponiveis" class="btn btn-outline-primary">Ver cursos populares</a>
                </div>
              </div>
          </div>
      </div>
  </div>
</div>

  
  <!-- Depoimentos -->
  <div class="container my-5">
    <h2 class="text-center fw-bold mb-4" style="color: #007BFF;">O que nossos alunos dizem</h2>
    <div class="row">
      <div class="col-md-4 mb-4">
        <div class="card shadow h-100">
          <div class="card-body">
            <p class="card-text">"Curso excelente, aprendi muito! A metodologia é clara e as aulas são práticas."</p>
            <div class="d-flex align-items-center mt-3">
              <img src="{{ asset('img/fortune.jpg') }}" alt="Aluno" class="me-2 rounded-circle" style="width: 40px; height: 40px;">

              <div>
                <p class="fw-bold mb-0">Claudia Raia</p>
                <small>Estudante de Marketing</small>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="card shadow h-100">
          <div class="card-body">
            <p class="card-text">"Os cursos são muito bem estruturados e os professores são atenciosos. Super recomendo!"</p>
            <div class="d-flex align-items-center mt-3">
              <img src="{{ asset('img/csa.png') }}" alt="Aluno" class="me-2 rounded-circle" style="width: 40px; height: 40px;">
              <div>
                <p class="fw-bold mb-0">João Silva</p>
                <small>Estudante de Programação</small>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="card shadow h-100">
          <div class="card-body">
            <p class="card-text">"Excelente plataforma para quem quer aprender de forma prática e eficaz."</p>
            <div class="d-flex align-items-center mt-3">
              <img src="{{ asset('img/ingles.jpg') }}" alt="Aluno" class="me-2 rounded-circle" style="width: 40px; height: 40px;">
              <div>
                <p class="fw-bold mb-0">Maria Oliveira</p>
                <small>Estudante de Desenvolvimento Web</small>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  

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

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>