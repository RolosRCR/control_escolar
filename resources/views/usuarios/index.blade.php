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
    <h2>Lista de Usuarios</h2>
    <a href="{{ route('usuarios.create') }}" class="btn btn-primary mb-3">Agregar Nuevo Usuario</a>
    <table class="table">
        <thead>
            <tr>
                <th>Clave</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Rol</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($usuarios as $usuario)
                <tr>
                    <td>{{ $usuario->id_usuario }}</td>
                    <td>{{ $usuario->nombre }}</td>
                    <td>{{ $usuario->email }}</td>
                    <td>{{ $usuario->rol }}</td>
                  
                    <td><a href="{{ route('usuarios.edit', $usuario->id_usuario) }}">✏️</a> </td>
                    <td>
                        <form action="{{ route('usuarios.destroy', $usuario->id_usuario) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
