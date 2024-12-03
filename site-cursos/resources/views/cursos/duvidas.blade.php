<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dúvidas - CursoNet</title>
  <link rel="shortcut icon" href="{{asset('img/cursoc.png')}}" type="image/x-icon">
   
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f9f9f9;
      margin: 0;
      padding: 0;
    }
    .container {
      max-width: 600px;
      margin: 50px auto;
      padding: 20px;
      background: #fff;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      border-radius: 8px;
    }
    h1 {
      text-align: center;
      color: #333;
    }
    form {
      display: flex;
      flex-direction: column;
    }
    label {
      margin-top: 15px;
      font-weight: bold;
      color: #555;
    }
    input, textarea, select, button {
      margin-top: 8px;
      padding: 10px;
      font-size: 14px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }
    textarea {
      resize: none;
      height: 100px;
    }
    button {
      background-color: #007bff;
      color: #fff;
      cursor: pointer;
      margin-top: 20px;
      border: none;
      transition: background 0.3s;
    }
    button:hover {
      background-color: #0056b3;
    }

    footer {
    position: fixed;
    bottom: 0;
    left: 0;
    width: 100%;
    background-color: #007bff;
    color: white;
    padding: 20px;
    text-align: center;
    z-index: 10;
}
  </style>
</head>
<body>

  
  <div class="container">
    <h1>Envie suas Dúvidas</h1>
    <form action="{{route.contato}}" method="post">
      <label for="name">Nome</label>
      <input type="text" id="name" name="name" placeholder="Digite seu nome" required>

      <label for="email">E-mail</label>
      <input type="email" id="email" name="email" placeholder="Digite seu e-mail" required>

      <label for="course">Curso (opcional)</label>
      <select id="course" name="course">
        <option value="">Selecione um curso</option>
        <option value="1">Reclamação</option>
        <option value="2">Duvidas</option>
        <option value="outros">Outros</option>
      </select>

      <label for="message">Sua dúvida</label>
      <textarea id="message" name="message" placeholder="Digite sua dúvida aqui" required></textarea>

      <button type="submit">Enviar</button>
    </form>
  </div>

  <footer class="footer">
    © 2024 CursoNet. Todos os direitos reservados.
  </footer>
  
</body>
</html>
