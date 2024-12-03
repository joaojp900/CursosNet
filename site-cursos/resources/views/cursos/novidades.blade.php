<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Novidades - CursoNet</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    body {
      font-family: 'Roboto', Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f9f9f9;
      color: #333;
    }

    .container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 40px 20px;
    }

    h1 {
      text-align: center;
      font-size: 2.5rem;
      color: #2b4eff;
      margin-bottom: 50px;
    }

    .timeline {
      position: relative;
      padding-left: 40px;
      margin-top: 20px;
    }

    .timeline::before {
      content: '';
      position: absolute;
      top: 0;
      left: 20px;
      bottom: 0;
      width: 4px;
      background-color: #2b4eff;
    }

    .event {
      margin-bottom: 30px;
      position: relative;
    }

 

    .event h2 {
      font-size: 1.8rem;
      color: #2b4eff;
      margin-bottom: 10px;
    }

    .event p, .event ul {
      font-size: 1rem;
      color: #555;
      line-height: 1.8;
      margin-left: 20px;
    }

    .event ul {
      list-style: disc;
    }

    .highlight {
      color: #2b4eff;
      font-weight: bold;
    }

    .footer {
      text-align: center;
      padding: 20px 0;
      background-color: #2b4eff;
      color: white;
      margin-top: 50px;
      font-size: 0.9rem;
    }

    @media (max-width: 768px) {
      h1 {
        font-size: 2rem;
      }

      .event h2 {
        font-size: 1.5rem;
      }

      .event p {
        font-size: 0.95rem;
      }
    }
  </style>
</head>
<body>
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
  <div class="container">
    <h1>Novidades da CursoNet</h1>
    <div class="timeline">

      <div class="event">
        <h2>🛠️ Cursos de Eletricista</h2>
        <p>
          Nós da CursoNet, temos uma grande novidade: o novo curso de 
          <span class="highlight">“Eletricista”</span>. Nosso objetivo é ensinar desde o básico até o nível intermediário, com aulas teóricas e práticas. O curso terá um total de 55 horas.
        </p>
      </div>

      <div class="event">
        <h2>💻 Mais Conteúdo nos Cursos de Programação</h2>
        <p>
          Sabemos que a programação está sempre evoluindo, então estamos evoluindo junto! Agora, nossos cursos incluem:
        </p>
        <ul>
          <li>Novas linguagens: <span class="highlight">Carbon, Julia e Swift</span>.</li>
          <li>Linguagens clássicas: <span class="highlight">Cobol, Godot e Pascal</span>.</li>
        </ul>
        <p>
          Atualize-se conosco e aprenda tecnologias novas e antigas!
        </p>
      </div>

      <div class="event">
        <h2>🌎 Tradução para Outras Línguas</h2>
        <p>
          Agora, os cursos da CursoNet estão disponíveis também em <span class="highlight">Espanhol</span> e <span class="highlight">Inglês</span>. Estamos trabalhando para traduzir nosso conteúdo para o máximo de idiomas possível. Aguarde mais novidades em breve!
        </p>
      </div>

      <div class="event">
        <h2>🔥 Promoção da Black Friday</h2>
        <p>
          Em Novembro, aproveite as promoções da Black Friday! Mais da metade dos nossos cursos estará com descontos a partir de <span class="highlight">50%</span>. Não perca essa oportunidade!
        </p>
      </div>

      <div class="event">
        <h2>🎤 Palestras</h2>
        <p>
          Em dias selecionados do mês, teremos palestras especializadas em conteúdos adicionais ou temas sociais como <span class="highlight">Setembro Amarelo</span>, <span class="highlight">Novembro Azul</span>, e muitos outros. Fique de olho na programação!
        </p>
      </div>

    </div>
  </div>

  <footer class="footer">
    © 2024 CursoNet. Todos os direitos reservados.
  </footer>
</body>
</html>