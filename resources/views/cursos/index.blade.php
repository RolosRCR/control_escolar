<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Cursos</title>
</head>
<body>
    @include('navbar')
<div class="container mt-5">

    <h2>Cursos</h2>
    <a href="{{ route('cursos.create') }}" class="btn btn-primary mb-3">Agregar Nuevo Curso</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>Id Curso</th>
                <th>Materia</th>
                <th>Profesor</th>
                <th>Hora de Inicio - Fin</th>
                <th>Editar</th>
                <th>Borrar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cursos as $curso)
            <tr>
                <td>{{ $curso->id_curso }}</td>
                <td>{{ $curso->materia->nombre }}</td>
                <td>{{ $curso->profesor->nombre }}</td>
                <td>{{ $curso->inicio }} - {{ $curso->fin }}</td>
                <td>
                    <a href="{{ route('cursos.edit', $curso->id_curso) }}" class="btn btn-warning">
                        ✏️
                    </a>
                </td>
                <td>
                    <form action="{{ route('cursos.destroy', $curso->id_curso) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">🗑️</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
