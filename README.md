# 📚 Desafio Cronos — Sistema de Biblioteca

Aplicação web desenvolvida em **PHP / Laravel** para cadastro, consulta e gerenciamento de acervo de livros e usuários.

## ✨ Funcionalidades
- CRUD completo de livros com validações no backend
- Migrations e Seeders estruturados (`BookSeeder`, `DatabaseSeeder`)
- Testes automatizados com PHPUnit

## 🛠️ Tecnologias
- PHP 8.2+ & Laravel
- SQLite / MySQL
- Vite, Blade & PHPUnit

## 🚀 Instalação
```bash
git clone https://github.com/willams502/desafio-cronos-12-08.git
cd desafio-cronos-12-08
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve
```

## 🧪 Testes
```bash
php artisan test
```

## 👤 Autor
**Matheus Willams** — [GitHub](https://github.com/willams502) · [LinkedIn](https://www.linkedin.com/in/matheuswillams/)
