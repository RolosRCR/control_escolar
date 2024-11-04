<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Materias</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<!-- @include('navbar') -->
    <div class="container mt-5">
        <h1>Materias</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Clave</th>
                    <th>Nombre</th>
                    <th>Créditos</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($materias as $materia)
                <tr>
                    <td>{{ $materia->id_materia }}</td>
                    <td>{{ $materia->nombre }}</td>
                    <td>{{ $materia->credito }}</td>
                    <td>
                        <a href="{{ route('materias.edit', $materia->id_materia) }}" class="btn btn-primary">
                            ✏️
                        </a>
                    </td>
                    <td>
                        <form action="{{ route('materias.destroy', $materia->id_materia) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                🗑️
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
