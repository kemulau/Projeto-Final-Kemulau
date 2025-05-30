# 📦 Projeto Final 

Sistema completo de gerenciamento de estoque com cadastro de clientes, produtos, categorias e controle de saídas, incluindo geração de QR Codes, relatórios, autenticação com Laravel Breeze e login social via Google. Desenvolvido com Laravel 11, Livewire, Volt, Vite, Socialite e outras tecnologias modernas.

---

## 🚀 Tecnologias Utilizadas

- **Laravel 11**
- **Laravel Breeze (auth)**
- **Livewire + Volt**
- **Vite (JS & CSS build)**
- **Laravel Socialite** (Login via Google)
- **DomPDF e Laravel Excel**
- **QR Code Generator**
- **MySQL via XAMPP (usuário root)**
- **Composer & NPM**

---

## 🧰 Requisitos

- [XAMPP](https://www.apachefriends.org/) com Apache e MySQL ativados
- [Composer](https://getcomposer.org/)
- [Node.js + npm](https://nodejs.org/)

---

## 🛠️ Configuração com XAMPP (MySQL root)

### 1. Baixe ou clone o projeto

```bash
cd C:/xampp/htdocs
git clone https://github.com/kemulau/Projeto-Final-Kemulau.git
```

Ou mova manualmente a pasta para `C:/xampp/htdocs/Projeto-Final-Kemulau`.

### 2. Acesse o diretório do projeto

```bash
cd C:/xampp/htdocs/Projeto-Final-Kemulau
```

### 3. Instale as dependências

```bash
composer install
npm install
```

### 4. Configure o ambiente

```bash
cp .env.example .env
php artisan key:generate
```

Abra o `.env` e confirme que está configurado assim (para XAMPP + root):

```dotenv
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=estoque
DB_USERNAME=root
DB_PASSWORD=
```

Crie o banco `estoque` via [http://localhost/phpmyadmin](http://localhost/phpmyadmin) (certifique-se de que o MySQL está ativo no XAMPP).
Você também pode criar o banco localmente utilizando ferramentas como o **MySQL Workbench**.

### 5. Rode as migrations

```bash
php artisan migrate
```

---

## ▶️ Executando o Projeto

### Backend com Laravel (php artisan serve)

1. Inicie o Apache e o MySQL pelo XAMPP (apenas o MySQL é necessário)
2. Em um terminal, rode:

```bash
php artisan serve
```

3. Acesse no navegador:

```
http://localhost:8000
```

### Frontend com Vite (em outro terminal)

```bash
npm run dev
```

> Isso iniciará o servidor Vite para carregar os assets de forma rápida e automática.

---

## 📚 Funcionalidades

- Login e registro (email/senha ou Google)
- Dashboard com Livewire + Volt
- CRUD de Clientes, Produtos, Categorias, Unidades
- Controle de Estoque e Saídas
- Relatórios de estoque em gráficos.
- QR Code para saídas
- Sistema com autenticação protegida

---

## 💻 Dica para desenvolvimento

Use dois terminais:

- Terminal 1: `php artisan serve`
- Terminal 2: `npm run dev`

