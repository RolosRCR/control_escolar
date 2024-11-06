
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Agregar Nuevo Usuario</h2>
    <form action="{{ route('usuarios.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" name="nombre" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" required>
        </div>
        <div class="mb-3">
            <label for="rol" class="form-label">Rol</label>
            <select class="form-control" name="rol" required>
                <option value="1">Administrador</option>
                <option value="2">Profesor</option>
                <option value="3">Alumno</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="contrasena" class="form-label">Contraseña</label>
            <input type="password" class="form-control" name="contrasena" required>
        </div>
        <button type="submit" class="btn btn-success">Agregar Usuario</button>
    </form>
</div>
</body>
</html>