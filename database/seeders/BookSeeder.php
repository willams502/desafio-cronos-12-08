<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $books = [
            ['title'=>'A Revolução dos Bichos','author'=>'George Orwell','publication_year'=>1945,'category'=>'Ficção','borrowed_by'=>null,'expected_return_date'=>null],
            ['title'=>'1984','author'=>'George Orwell','publication_year'=>1949,'category'=>'Ficção','borrowed_by'=>'Maria Silva','expected_return_date'=>'2026-09-01'],
            ['title'=>'Sapiens','author'=>'Yuval Noah Harari','publication_year'=>2011,'category'=>'História','borrowed_by'=>null,'expected_return_date'=>null],
            ['title'=>'O Código da Vinci','author'=>'Dan Brown','publication_year'=>2003,'category'=>'Ficção','borrowed_by'=>null,'expected_return_date'=>null],
            ['title'=>'Clean Code','author'=>'Robert C. Martin','publication_year'=>2008,'category'=>'Tecnologia','borrowed_by'=>null,'expected_return_date'=>null],
            ['title'=>'O Pequeno Príncipe','author'=>'Antoine de Saint-Exupéry','publication_year'=>1943,'category'=>'Infantil','borrowed_by'=>'João Pereira','expected_return_date'=>'2026-08-20'],
            ['title'=>'Dom Casmurro','author'=>'Machado de Assis','publication_year'=>1899,'category'=>'Ficção','borrowed_by'=>null,'expected_return_date'=>null],
            ['title'=>'A Arte da Guerra','author'=>'Sun Tzu','publication_year'=>-500,'category'=>'História','borrowed_by'=>null,'expected_return_date'=>null],
            ['title'=>'Programação em PHP','author'=>'Autor Exemplo','publication_year'=>2015,'category'=>'Tecnologia','borrowed_by'=>null,'expected_return_date'=>null],
            ['title'=>'História do Brasil','author'=>'Autor Brasileiro','publication_year'=>2010,'category'=>'História','borrowed_by'=>null,'expected_return_date'=>null],
            ['title'=>'Arquitetura Limpa','author'=>'Robert C. Martin','publication_year'=>2017,'category'=>'Tecnologia','borrowed_by'=>null,'expected_return_date'=>null],
            ['title'=>'Poemas Escolhidos','author'=>'Carlos Drummond de Andrade','publication_year'=>1950,'category'=>'Poesia','borrowed_by'=>null,'expected_return_date'=>null],
            ['title'=>'Introdução à Física','author'=>'Isaac Newton','publication_year'=>1687,'category'=>'Ciência','borrowed_by'=>null,'expected_return_date'=>null],
            ['title'=>'Cem Anos de Solidão','author'=>'Gabriel García Márquez','publication_year'=>1967,'category'=>'Ficção','borrowed_by'=>null,'expected_return_date'=>null],
            ['title'=>'O Senhor dos Anéis','author'=>'J. R. R. Tolkien','publication_year'=>1954,'category'=>'Ficção','borrowed_by'=>null,'expected_return_date'=>null],
        ];

        foreach ($books as $b) {
            Book::create($b);
        }
    }
}
