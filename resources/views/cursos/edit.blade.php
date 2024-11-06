<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Editar Curso</title>
</head>

<body>
    @include('navbar')

    <div class="container mt-5">
        <h2>Editar Curso</h2>
        <form action="{{ route('cursos.update', $curso->id_curso) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="id_materia" class="form-label">Materia</label>
                <select name="id_materia" class="form-select">
                    @foreach($materias as $materia)
                        <option value="{{ $materia->id_materia }}" {{ $curso->id_materia == $materia->id_materia ? 'selected' : '' }}>
                            {{ $materia->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="id_profesor" class="form-label">Profesor</label>



                <select name="id_profesor" class="form-select">
                    @foreach($profesores as $profesor)
                        <option value="{{ $profesor->id_usuario }}" {{ $curso->id_profesor == $profesor->id_usuario ? 'selected' : '' }}>
                            {{ $profesor->nombre }}
                        </option>
                    @endforeach
                </select>




            </div>

            <div class="mb-3">
                <label for="inicio" class="form-label">Hora de Inicio</label>
                <input type="time" class="form-control" name="inicio"
                    value="{{ date('H:i', strtotime($curso->inicio)) }}" required>
            </div>

            <div class="mb-3">
                <label for="fin" class="form-label">Hora de Fin</label>
                <input type="time" class="form-control" name="fin" value="{{ date('H:i', strtotime($curso->fin)) }}"
                    required>
            </div>


            <button type="submit" class="btn btn-success">Guardar Cambios</button>
        </form>
    </div>
</body>

</html>