<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Agregar Nueva Materia</title>
</head>
<body>
<div class="container mt-5">
    <h2>Agregar Nueva Materia</h2>
    <form action="{{ route('materias.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="id_materia" class="form-label">Clave</label>
            <input type="number" class="form-control" name="id_materia" required>
        </div>

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" name="nombre" required>
        </div>

        <div class="mb-3">
            <label for="credito" class="form-label">Créditos</label>
            <input type="number" class="form-control" name="credito" min="2" max="8" required>
        </div>

        <button type="submit" class="btn btn-primary">Agregar Materia</button>
    </form>
</div>

</body>
</html>
