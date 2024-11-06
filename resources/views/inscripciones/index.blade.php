<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Lista de Inscripciones</title>
</head>

<body>
    @include('navbar')

    <div class="container mt-5">
        <h2>Inscripciones</h2>
        <a href="{{ route('inscripciones.create') }}" class="btn btn-primary mb-3">Agregar Inscripción</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Curso</th>
                    <th>Alumno</th>
                    <th>Parcial 1</th>
                    <th>Parcial 2</th>
                    <th>Parcial 3</th>
                    <th>Parcial 4</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                @foreach($inscripciones as $inscripcion)
                    <tr>
                        <td>{{ $inscripcion->id_inscripcion }}</td>
                        <td>{{ $inscripcion->curso->id_curso }}</td>
                        <td>{{ $inscripcion->alumno->nombre }}</td>
                        <td>{{ $inscripcion->parcial_uno }}</td>
                        <td>{{ $inscripcion->parcial_dos }}</td>
                        <td>{{ $inscripcion->parcial_tres }}</td>
                        <td>{{ $inscripcion->parcial_cuatro }}</td>
                        
                        <td>
                            <a href="{{ route('inscripciones.edit', $inscripcion) }}">✏️</a>
                        </td>
                        
                        <td>
                            <form action="{{ route('inscripciones.destroy', $inscripcion->id_inscripcion) }}" method="POST">
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