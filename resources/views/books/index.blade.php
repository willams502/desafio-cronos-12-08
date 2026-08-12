@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex align-items-center justify-content-between mb-3">
        <h1 class="h3 mb-0">Acervo</h1>
        <div>
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createBookModal">Novo livro</button>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-body">
            <form method="GET" class="row g-2">
                <div class="col-md-5">
                    <input type="text" name="q" value="{{ request('q') }}" class="form-control" placeholder="Buscar por título">
                </div>
                <div class="col-md-4">
                    <select name="category" class="form-select">
                        <option value="">Todas as categorias</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat }}" {{ (request('category') == $cat) ? 'selected' : '' }}>{{ $cat }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3 d-flex gap-2">
                    <button class="btn btn-primary" type="submit">Filtrar</button>
                    <a href="{{ route('books.index') }}" class="btn btn-outline-secondary">Limpar</a>
                </div>
            </form>
        </div>
    </div>

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
                        <td colspan="6">
                            <div class="text-center py-4">
                                <p class="lead mb-2">Nenhum livro encontrado.</p>
                                <p class="mb-3">Tente limpar os filtros ou cadastre um novo livro.</p>
                                <div>
                                    <a href="{{ route('books.index') }}" class="btn btn-outline-secondary me-2">Limpar filtros</a>
                                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createBookModal">Cadastrar livro</button>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{ $books->links() }}
</div>
 
<!-- Create Book Modal -->
<div class="modal fade" id="createBookModal" tabindex="-1" aria-labelledby="createBookModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createBookModalLabel">Cadastrar Livro</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ route('books.store') }}" id="createBookForm" novalidate>
            @csrf

            <div class="mb-3">
                <label for="title_modal" class="form-label">Título *</label>
                <input type="text" name="title" id="title_modal" required class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}">
                @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
                <div class="invalid-feedback">O título é obrigatório.</div>
            </div>

            <div class="mb-3">
                <label for="author_modal" class="form-label">Autor *</label>
                <input type="text" name="author" id="author_modal" required class="form-control @error('author') is-invalid @enderror" value="{{ old('author') }}">
                @error('author')<div class="invalid-feedback">{{ $message }}</div>@enderror
                <div class="invalid-feedback">O autor é obrigatório.</div>
            </div>

            <div class="mb-3">
                <label for="publication_year_modal" class="form-label">Ano de publicação</label>
                <input type="number" name="publication_year" id="publication_year_modal" class="form-control @error('publication_year') is-invalid @enderror" value="{{ old('publication_year') }}">
                @error('publication_year')<div class="invalid-feedback">{{ $message }}</div>@enderror
                <div class="invalid-feedback">Informe um ano válido.</div>
            </div>

            <div class="mb-3">
                <label for="category_modal" class="form-label">Categoria</label>
                <input type="text" name="category" id="category_modal" class="form-control @error('category') is-invalid @enderror" value="{{ old('category') }}">
                @error('category')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label for="borrowed_by_modal" class="form-label">Emprestado para</label>
                <input type="text" name="borrowed_by" id="borrowed_by_modal" class="form-control @error('borrowed_by') is-invalid @enderror" value="{{ old('borrowed_by') }}">
                @error('borrowed_by')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label for="expected_return_date_modal" class="form-label">Data prevista de retorno</label>
                <input type="date" name="expected_return_date" id="expected_return_date_modal" class="form-control @error('expected_return_date') is-invalid @enderror" value="{{ old('expected_return_date') }}">
                @error('expected_return_date')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

@section('scripts')
<script>
    // Bootstrap-style client-side validation
    (function () {
        'use strict'

        var form = document.getElementById('createBookForm');
        if (!form) return;

        form.addEventListener('submit', function (event) {
            // Clear previous validation state
            form.classList.remove('was-validated');

            if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
                form.classList.add('was-validated');
            }
            // Let browser and HTML5 validation handle the rest
        }, false);

        // If server validation errors exist, open modal automatically
        @if($errors->any())
            var modalEl = document.getElementById('createBookModal');
            var modal = new bootstrap.Modal(modalEl);
            modal.show();
            // mark fields with server-side errors
            @foreach($errors->keys() as $key)
                var el = document.querySelector('[name="' + '{{ $key }}' + '"]');
                if (el) el.classList.add('is-invalid');
            @endforeach
        @endif

    })();
</script>
@endsection
@endsection
