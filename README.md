# 🎓 CursosNet

**CursosNet** é uma plataforma de cursos online desenvolvida em **Laravel 11**, com design responsivo utilizando **Tailwind CSS** e **Bootstrap**. O projeto foi criado com o objetivo de facilitar a inscrição de alunos em cursos, além de oferecer uma área administrativa para gerenciamento completo das formações disponíveis.

---

## 🚀 Funcionalidades

* ✅ Cadastro, edição e exclusão de cursos (área administrativa)
* ✅ Visualização de cursos disponíveis para alunos
* ✅ Inscrição de alunos em cursos
* ✅ Visualização de aulas
* ✅ Interface responsiva e intuitiva
* ✅ Login e autenticação diferenciada para administradores e alunos
* 🚫 Certificados ainda não implementados (omitidos propositalmente)

---

## 🛠️ Tecnologias Utilizadas

* **Back-end:** Laravel 11
* **Front-end:** Tailwind CSS, Bootstrap
* **Banco de Dados:** MySQL
* **Gerenciador de Pacotes PHP:** Composer
* **Build de assets:** Vite (via Laravel Mix)

---

## 💻 Requisitos para Executar

Antes de iniciar, certifique-se de que os seguintes softwares estejam instalados na sua máquina:

* PHP >= 8.2
* Composer
* Node.js e npm
* MySQL
* Git
* Um servidor local (Laravel Sail, XAMPP, WAMP ou Valet)

---

## 📦 Instalação

1. **Clone o repositório**

```bash
git clone https://github.com/joaojp900/CursosNet.git
cd CursosNet
```

2. **Instale as dependências do Laravel**

```bash
composer install
```

3. **Instale as dependências do Node.js**

```bash
npm install
```

4. **Configure o arquivo `.env`**

Copie o exemplo:

```bash
cp .env.example .env
```

Edite o arquivo `.env` com os dados do seu banco de dados MySQL:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=cursosnet
DB_USERNAME=root
DB_PASSWORD=suasenha
```

5. **Gere a chave da aplicação**

```bash
php artisan key:generate
```

6. **Execute as migrações do banco de dados**

```bash
php artisan migrate
```

7. **Inicie o servidor de desenvolvimento**

```bash
php artisan serve
```

8. **Compile os assets do front-end**

```bash
npm run dev
```

---

## 🔐 Credenciais de Acesso (Administrador)

* **Email:** `test@adm.com`
* **Senha:** `admin123`

---

## 🧪 Teste Rápido

Após iniciar o servidor com `php artisan serve`, acesse o navegador em:

```
http://127.0.0.1:8000
```

Faça login com as credenciais acima para acessar o painel administrativo.

---

## 📝 Considerações Finais

O **CursosNet** está em constante evolução. Certificados, painéis de progresso e integração com gateways de pagamento são recursos futuros planejados.  

---

 
