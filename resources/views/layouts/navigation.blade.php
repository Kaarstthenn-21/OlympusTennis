<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/index-usuario.css') }}">
    <title>Barra de navegación</title>
    <style>
        /* Estilo para el menú de navegación */
        .nav1, .nav2 {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .nav1 li, .nav2 li {
            display: inline-block;
            position: relative;
        }

        /* Estilo uniforme para los enlaces y botones en la barra de navegación */
        .nav-button, .dropbtn {
            background-color: #000; /* Negro */
            color: white;
            padding: 5px 10px; /* Ajuste del padding para hacer más delgado */
            font-size: 16px;
            border: none;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            line-height: 30px; /* Ajustar la altura de la línea */
        }

        .nav-button:hover, .dropbtn:hover, .dropdown-content a:hover {
            background-color: #333; /* Un poco más claro que el negro */
        }

        /* Estilo para el menú desplegable */
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #000; /* Negro */
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
            right: 0; /* Alinear el menú desplegable a la derecha */
        }

        .dropdown-content a {
            color: white;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {
            background-color: #333;
        }

        /* Estilo para el botón de logout en el formulario */
        .logout-button {
            background: none;
            border: none;
            color: white;
            font-size: 16px;
            cursor: pointer;
            padding: 5px 10px; /* Ajuste del padding para hacer más delgado */
            text-align: left;
            display: block;
            width: 100%;
        }

        .logout-button:hover {
            background-color: #333;
        }

        /* Estilo para el fondo del nav */
        nav {
            background-color: #000 !important; /* Negro */
            padding: 5px 10px; /* Ajuste del padding para hacer más delgado */
        }

        /* Estilo para el header */
        header {
            padding: -20px ; /* Ajuste del padding para hacer más delgado */
            background-color: #000
        }
    </style>
</head>
<body>
    <header>
        <nav>
            <ul class="nav1">
                <li><a href="{{ route('seleccionarCancha') }}">Reservar</a></li>
                <li><a href="{{ route('clases.list') }}">Academia Tennis</a></li>
                <li><a href="{{ route('inscribirsetorneo.index') }}">Torneos</a></li>
            </ul>
            <a href="{{ route('dashboard') }}">
                <img src="{{ asset('img/Logo Olympues Tennis Camp.png') }}" alt="Logo Olympues Tennis Camp">
            </a>
            <ul class="nav2">
                <li><a href="https://maps.app.goo.gl/QaC9SR8xv44rnfVB9" class="nav-button">Ubicación</a></li>
                @if (Auth::check())
                    <li class="dropdown">
                        <a href="#" class="nav-button dropbtn">Cuenta de {{ Auth::user()->name }}</a>
                        <div class="dropdown-content">
                            <a href="{{ route('reservas.usuario') }}">Mis Reservas</a>
                            <a href="{{ route('inscripciones.mis_clases') }}">Mis Clases</a>
                            <a href="{{ route('profile.edit') }}">Perfil</a>
                        </div>
                    </li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="logout-button">Salir</button>
                        </form>
                    </li>
                @else 
                    <li><a href="#" class="nav-button">Iniciar Sesión</a></li>
                    <li><a href="#" class="nav-button">Registrate</a></li>
                @endif
            </ul>
        </nav>
    </header>

    <script>
        // Manejo del menú desplegable
        document.addEventListener('click', function(event) {
            const dropdown = document.querySelector('.dropdown-content');
            const dropbtn = document.querySelector('.dropbtn');
            
            if (dropbtn.contains(event.target)) {
                dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
            } else if (!dropdown.contains(event.target)) {
                dropdown.style.display = 'none';
            }
        });
    </script>
</body>
</html>
