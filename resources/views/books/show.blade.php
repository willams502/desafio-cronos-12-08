@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalhes do Livro</h1>

    <div class="card mb-3">
        <div class="card-body">
            <h3 class="card-title">{{ $book->title }}</h3>
            <p class="card-text"><strong>Autor:</strong> {{ $book->author }}</p>
            <p class="card-text"><strong>Categoria:</strong> {{ $book->category ?? '—' }}</p>
            <p class="card-text"><strong>Ano de publicação:</strong> {{ $book->publication_year ?? '—' }}</p>
            <p class="card-text"><strong>Situação:</strong>
                @if($book->borrowed_by)
                    <span class="badge bg-danger">Emprestado para {{ $book->borrowed_by }}</span>
                    <br>
                    <small>Retorno esperado: {{ optional($book->expected_return_date)->format('d/m/Y') }}</small>
                @else
                    <span class="badge bg-success">Disponível</span>
                @endif
            </p>
        </div>
    </div>

    <a href="{{ route('books.index') }}" class="btn btn-secondary">Voltar à listagem</a>
</div>
@endsection
