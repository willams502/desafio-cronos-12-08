@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Cadastrar Livro</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('books.store') }}" id="createPageForm" novalidate>
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Título *</label>
            <input type="text" name="title" id="title" required class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}">
            @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="mb-3">
            <label for="author" class="form-label">Autor *</label>
            <input type="text" name="author" id="author" required class="form-control @error('author') is-invalid @enderror" value="{{ old('author') }}">
            @error('author')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="mb-3">
            <label for="publication_year" class="form-label">Ano de publicação</label>
            <input type="number" name="publication_year" id="publication_year" class="form-control @error('publication_year') is-invalid @enderror" value="{{ old('publication_year') }}">
            @error('publication_year')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="mb-3">
            <label for="category" class="form-label">Categoria</label>
            <input type="text" name="category" id="category" class="form-control @error('category') is-invalid @enderror" value="{{ old('category') }}">
            @error('category')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="mb-3">
            <label for="borrowed_by" class="form-label">Emprestado para</label>
            <input type="text" name="borrowed_by" id="borrowed_by" class="form-control @error('borrowed_by') is-invalid @enderror" value="{{ old('borrowed_by') }}">
            @error('borrowed_by')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="mb-3">
            <label for="expected_return_date" class="form-label">Data prevista de retorno</label>
            <input type="date" name="expected_return_date" id="expected_return_date" class="form-control @error('expected_return_date') is-invalid @enderror" value="{{ old('expected_return_date') }}">
            @error('expected_return_date')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="{{ route('books.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@section('scripts')
<script>
    (function () {
        'use strict'

        var form = document.getElementById('createPageForm');
        if (!form) return;

        form.addEventListener('submit', function (event) {
            form.classList.remove('was-validated');
            if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
                form.classList.add('was-validated');
            }
        }, false);

        @if($errors->any())
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
