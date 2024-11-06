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
    <h2>Editar Usuario</h2>
    <form action="{{ route('usuarios.update', $usuario->id_usuario) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" name="nombre" value="{{ $usuario->nombre }}">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" value="{{ $usuario->email }}">
        </div>

        <div class="mb-3">
            <label for="rol" class="form-label">Rol</label>
            <select class="form-select" name="rol">
                <option value="1" {{ $usuario->rol == 1 ? 'selected' : '' }}>Administrador</option>
                <option value="2" {{ $usuario->rol == 2 ? 'selected' : '' }}>Profesor</option>
                <option value="3" {{ $usuario->rol == 3 ? 'selected' : '' }}>Alumno</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="contrasena" class="form-label">Contraseña</label>
            <input type="password" class="form-control" name="contrasena">
            <small class="form-text text-muted">Deja el campo vacío si no deseas cambiar la contraseña.</small>
        </div>

        <button type="submit" class="btn btn-success">Guardar Cambios</button>
    </form>
</div>
</body>
</html>
