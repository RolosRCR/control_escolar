<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Control Escolar</title>
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Control escolar</a>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    @if(session('rol') == 1)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('usuarios.index') }}">Usuarios</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('materias.index') }}">Materias</a>
                        </li>
                    @endif

                    @if(session('rol') == 1 || session('rol') == 2)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('cursos.index') }}">Cursos</a>
                        </li>
                    @endif

                    @if(session('rol') == 1 || session('rol') == 2 || session('rol') == 3)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('inscripciones.index') }}">Inscripciones</a>
                        </li>
                    @endif
                </ul>
                
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <button class="btn btn-danger" onclick="window.location.href='{{ route('login') }}'">Salir</button>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
