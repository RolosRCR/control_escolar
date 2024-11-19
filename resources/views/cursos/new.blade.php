<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Agregar Curso</title>
</head>

<body>
    <div class="container mt-5">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <h2>Agregar Curso</h2>



        <form action="{{ route('cursos.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="id_materia" class="form-label">Clave de Materia</label>
                <select name="id_materia" class="form-select" required>
                    <option value="">Seleccionar materia</option>
                    @foreach ($materias as $materia)
                        <option value="{{ $materia->id_materia }}">{{ $materia->nombre }}</option>
                    @endforeach
                </select>
            </div>

            


            @if(session('rol') != 2)
            <div class="mb-3">
                <label for="id_profesor" class="form-label">Clave de Profesor</label>
                <select name="id_profesor" class="form-select" required>
                    <option value="">Seleccionar profesor</option>
                    @foreach ($profesores as $profesor)
                        <option value="{{ $profesor->id_usuario }}">{{ $profesor->nombre }}</option>
                    @endforeach
                </select>
            </div>    
            
            
            @else
                <input type="hidden" name="id_profesor" value="{{ session('id') }}">
            @endif













            <div class="mb-3">
                <label for="inicio" class="form-label">Hora de Inicio</label>
                <input type="time" class="form-control" name="inicio" required>
            </div>

            <div class="mb-3">
                <label for="fin" class="form-label">Hora de Fin</label>
                <input type="time" class="form-control" name="fin" required>
            </div>

            <button type="submit" class="btn btn-success">Agregar Curso</button>
        </form>
    </div>
</body>

</html>