<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    @include('navbar')

<div class="container mt-5">
    <h2>Editar Materia</h2>
    <form action="{{ route('materias.update', $materia->id_materia) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" name="nombre" value="{{ $materia->nombre }}">
        </div>

        <div class="mb-3">
            <label for="credito" class="form-label">Créditos</label>
            <input type="number" class="form-control" name="credito" value="{{ $materia->credito }}">
        </div>

        <button type="submit" class="btn btn-success">Guardar Cambios</button>
    </form>
</div>

</body>
</html>