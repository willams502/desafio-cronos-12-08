@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Acervo</h1>
    <div class="mb-3">
        <a href="{{ route('books.create') }}" class="btn btn-success">Novo livro</a>
    </div>

    <form method="GET" class="row g-2 mb-3">
        <div class="col-md-4">
            <input type="text" name="q" value="{{ request('q') }}" class="form-control" placeholder="Buscar por título">
        </div>
        <div class="col-md-3">
            <select name="category" class="form-select">
                <option value="">Todas as categorias</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat }}" {{ (request('category') == $cat) ? 'selected' : '' }}>{{ $cat }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-2">
            <button class="btn btn-primary" type="submit">Filtrar</button>
        </div>
    </form>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Autor</th>
                    <th>Categoria</th>
                    <th>Ano</th>
                    <th>Situação</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($books as $book)
                    <tr>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->author }}</td>
                        <td>{{ $book->category }}</td>
                        <td>{{ $book->publication_year }}</td>
                        <td>
                            @if($book->borrowed_by)
                                <span class="badge bg-danger">Emprestado</span>
                            @else
                                <span class="badge bg-success">Disponível</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('books.show', $book->id) }}" class="btn btn-sm btn-primary">Detalhes</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">Nenhum livro encontrado.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{ $books->links() }}
</div>
@endsection
