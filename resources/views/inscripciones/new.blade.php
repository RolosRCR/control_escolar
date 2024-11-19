<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Nueva Inscripción</title>
</head>

<body>

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
        <h2>Agregar Nueva Inscripción</h2>
        <form action="{{ route('inscripciones.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="id_curso" class="form-label">Curso</label>
                <select name="id_curso" id="id_curso" class="form-control">
                    <option value="">Seleccione un curso</option>
                    @foreach($cursos as $curso)
                        <option value="{{ $curso->id_curso }}" {{ old('id_curso') == $curso->id_curso ? 'selected' : '' }}>
                            {{ $curso->id_curso }} - {{ $curso->materia->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            @if(session('rol') != 3)
                <div class="mb-3">
                    <label for="id_alumno" class="form-label">Alumno</label>
                    <select name="id_alumno" id="id_alumno" class="form-control">
                        <option value="">Seleccione un alumno</option>
                        @foreach($alumnos as $alumno)
                            <option value="{{ $alumno->id_usuario }}" {{ old('id_alumno') == $alumno->id_usuario ? 'selected' : '' }}>
                                {{ $alumno->id_usuario }} - {{ $alumno->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>
            @else
                <input type="hidden" name="id_alumno" value="{{ session('id') }}">
            @endif

            @if(session('rol') != 3)
                <div class="mb-3">
                    <label for="parcial_uno" class="form-label">Parcial Uno</label>
                    <input type="number" step="0.01" class="form-control" name="parcial_uno" id="parcial_uno" value="{{ old('parcial_uno') }}">
                </div>

                <div class="mb-3">
                    <label for="parcial_dos" class="form-label">Parcial Dos</label>
                    <input type="number" step="0.01" class="form-control" name="parcial_dos" id="parcial_dos" value="{{ old('parcial_dos') }}">
                </div>

                <div class="mb-3">
                    <label for="parcial_tres" class="form-label">Parcial Tres</label>
                    <input type="number" step="0.01" class="form-control" name="parcial_tres" id="parcial_tres" value="{{ old('parcial_tres') }}">
                </div>

                <div class="mb-3">
                    <label for="parcial_cuatro" class="form-label">Parcial Cuatro</label>
                    <input type="number" step="0.01" class="form-control" name="parcial_cuatro" id="parcial_cuatro" value="{{ old('parcial_cuatro') }}">
                </div>
            @else
                <!-- Campos ocultos si el rol es de alumno -->
                <input type="hidden" name="parcial_uno" value="0">
                <input type="hidden" name="parcial_dos" value="0">
                <input type="hidden" name="parcial_tres" value="0">
                <input type="hidden" name="parcial_cuatro" value="0">
            @endif

            <button type="submit" class="btn btn-primary">Guardar Inscripción</button>
        </form>
    </div>
</body>

</html>
