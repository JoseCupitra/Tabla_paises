@extends('home')

@section('content')

<div class="container mt-4">
    <h3 class="text-center mb-4">LISTA DE PAÍSES</h3>

    <!-- Formulario de búsqueda por nombre -->
    <div class="row mb-3">
        <div class="col-md-6 offset-md-3">
            <form action="{{ route('home.index') }}" method="GET">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Buscar por nombre" name="nombre" value="{{ request('nombre') }}">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">Buscar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Botones de acción -->
    <div class="text-right mb-4">
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#create">CREAR</button>
        <button type="button" class="btn btn-primary">EXPORTAR</button>
    </div>

    <!-- Tabla Responsiva -->
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="bg-dark text-white">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">NOMBRE</th>
                    <th scope="col">CAPITAL</th>
                    <th scope="col">IDIOMA</th>
                    <th scope="col">ACCIONES</th>
                </tr>
            </thead>
            <tbody>
                @forelse($paises as $pais)
                <tr class="table-row" data-toggle="modal" data-target="#edit{{ $pais->id }}">
                    <td scope="row">{{ $pais->id }}</td>
                    <td>{{ $pais->Nombre }}</td>
                    <td>{{ $pais->Capital }}</td>
                    <td>{{ $pais->Idioma_oficial }}</td>
                    <td>
                        <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#edit{{ $pais->id }}">Editar</button>
                        <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#delete{{ $pais->id }}">Eliminar</button>
                    </td>
                </tr>
                @include('pais.info')
                @empty
                <tr>
                    <td colspan="5" class="text-center">No hay países disponibles</td>
                </tr>
                @endforelse
            </tbody>
        </table>

                <!-- Mostrar la paginación -->
<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
        {{-- Enlace "Anterior" --}}
        @if ($paises->onFirstPage())
            <li class="page-item disabled">
                <span class="page-link" tabindex="-1"><</span>
            </li>
        @else
            <li class="page-item">
                <a class="page-link" href="{{ $paises->previousPageUrl() }}" tabindex="-1"><</a>
            </li>
        @endif

        {{-- Números de páginas --}}
        @for ($i = 1; $i <= $paises->lastPage(); $i++)
            <li class="page-item {{ ($paises->currentPage() == $i) ? 'active' : '' }}">
                <a class="page-link" href="{{ $paises->url($i) }}">{{ $i }}</a>
            </li>
        @endfor

        {{-- Enlace "Siguiente" --}}
        @if ($paises->hasMorePages())
            <li class="page-item">
                <a class="page-link" href="{{ $paises->nextPageUrl() }}">></a>
            </li>
        @else
            <li class="page-item disabled">
                <span class="page-link">></span>
            </li>
        @endif
    </ul>
</nav>

        </div>
    </div>
    <div class="col-md-2"></div>
</div>

@include('pais.create')

@endsection
