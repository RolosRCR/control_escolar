<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Editar Inscripción</title>
</head>

<body>
    @include('navbar')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="container mt-5">
        <h2>Editar Inscripción</h2>
        <form action="{{ route('inscripciones.update', $inscripcion->id_inscripcion) }}" method="POST">
            @csrf
            @method('PUT')


            <div class="mb-3">
                <label for="id_curso" class="form-label">Curso</label>
                <select name="id_curso" class="form-control">
                    <option value="">Seleccione un curso</option>
                    @foreach($cursos as $curso)
                        <option value="{{ $curso->id_curso }}" {{ $curso->id_curso == $inscripcion->id_curso ? 'selected' : '' }}>
                            {{ $curso->id_curso }} - {{ $curso->materia->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>


            <div class="mb-3">
                <label for="id_alumno" class="form-label">Alumno</label>
                <select name="id_alumno" class="form-control">
                    @foreach($alumnos as $alumno)
                        <option value="{{ $alumno->id_usuario }}">
                            {{ $alumno->id_usuario }} - {{ $alumno->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="estado" class="form-label">Estado de la Inscripción</label>
                <select name="estado" class="form-control">
                    <option value="0" {{ $inscripcion->estado == 0 ? 'selected' : '' }}>No aprobado</option>
                    <option value="1" {{ $inscripcion->estado == 1 ? 'selected' : '' }}>Aprobado</option>
                </select>
            </div>




            <div class="mb-3">
                <label for="parcial_uno" class="form-label">Parcial Uno</label>
                <input type="number" step="0.01" class="form-control" name="parcial_uno"
                    value="{{ $inscripcion->parcial_uno }}">
            </div>

            <div class="mb-3">
                <label for="parcial_dos" class="form-label">Parcial Dos</label>
                <input type="number" step="0.01" class="form-control" name="parcial_dos"
                    value="{{ $inscripcion->parcial_dos }}">
            </div>

            <div class="mb-3">
                <label for="parcial_tres" class="form-label">Parcial Tres</label>
                <input type="number" step="0.01" class="form-control" name="parcial_tres"
                    value="{{ $inscripcion->parcial_tres }}">
            </div>

            <div class="mb-3">
                <label for="parcial_cuatro" class="form-label">Parcial Cuatro</label>
                <input type="number" step="0.01" class="form-control" name="parcial_cuatro"
                    value="{{ $inscripcion->parcial_cuatro }}">
            </div>

            <button type="submit" class="btn btn-primary">Actualizar Inscripción</button>
        </form>
    </div>
</body>

</html>