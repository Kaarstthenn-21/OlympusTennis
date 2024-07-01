<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/index-usuario.css') }}">
    <title>Document</title>
    <style>
        /* Estilos para la barra de navegación */
        .nav-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background-color: #000; /* Negro */
            padding: 5px 10px;
        }

        .nav1, .nav2 {
            list-style-type: none;
            padding: 0;
            margin: 0;
            display: flex;
            align-items: center;
        }

        .nav1 li, .nav2 li {
            margin: 0 10px; /* Espacio entre los elementos */
        }

        /* Estilos uniformes para los enlaces y botones en la barra de navegación */
        .nav-button {
            background-color: #000; /* Negro */
            color: white;
            padding: 5px 10px;
            font-size: 16px;
            border: none;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            line-height: 30px; /* Ajuste de la altura de la línea */
        }

        .nav-button:hover {
            background-color: #333; /* Un poco más claro que el negro */
        }

        /* Estilos para el logo */
        .logo {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-grow: 1;
        }

        /* Estilos para el header */
        header {
            background-color: #000;
        }

        .conteiner_one {
            background-image: url("{{ asset('img/Index.jpeg') }}");
            background-repeat: no-repeat;
            background-size: cover;
        }

        .conteiner_three {
            background-image: url("{{ asset('img/Torneos 3.jpeg') }}");
            background-repeat: no-repeat;
            background-size: cover;
        }

        .conteiner_five {
            background-image: url("{{ asset('img/Canchas.png') }}");
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
</head>
<body>
    <header>
        <nav class="nav-container">
            <ul class="nav1">
                <li><a href="/login" class="nav-button">Inicio</a></li>
                <li><a href="/register" class="nav-button">Registro</a></li>
                <li><a href="{{ route('login') }}" class="nav-button">Reserva</a></li>
            </ul>
            <div class="logo">
                <img src="{{ asset('img/Logo Olympues Tennis Camp.png') }}" alt="Logo Olympues Tennis Camp">
            </div>
            <ul class="nav2">
                <li><a href="{{ route('login') }}" class="nav-button">Academia Tennis</a></li>
                <li><a href="{{ route('login') }}" class="nav-button">Torneos</a></li>
                <li><a href="https://maps.app.goo.gl/QaC9SR8xv44rnfVB9" class="nav-button">Ubicación</a></li>
            </ul>
        </nav>
    </header>

    <div class="conteiner_one">
        <h1 class="title_conteiner_one">OLYMPUS</h1>
        <h1 class="title_conteiner_onee">TENNIS CAMP</h1>
    </div>
    <div class="conteiner_two roww">
        <div class="input-gruopp">
            <p class="p_conteiner_two">________________________________</p>
            <h2 class="title_conteiner_two">Acerca de nosotros</h2>
            <p class="p_conteiner_two">En nuestra empresa, nos apasiona brindar a nuestros clientes la oportunidad de disfrutar 
                del tenis en su máxima expresión. Nos enorgullece ofrecer instalaciones de primera calidad 
                y un servicio excepcional para garantizar que cada visita a nuestras canchas sea una 
                experiencia inolvidable. Ya sea que seas un jugador experimentado o estés dando tus primeros 
                pasos en este apasionante deporte, estamos aquí para proporcionarte un espacio donde puedas 
                desarrollar tu pasión por el tenis y crear recuerdos duraderos. ¡Únete a nosotros y descubre 
                todo lo que nuestro centro de alquiler de canchas tiene para ofrecer!"</p>
        </div>
        <div class="input-gruopp">
            <img src="{{ asset('img/Ubicación.jpg') }}" class="img_conteiner_two">
        </div>
    </div>
    <div class="conteiner_three roww">
        <div class="input-gruopp">
            <img src="{{ asset('img/Competidor 2.jpg') }}" class="img_conteiner_two">
        </div>
        <div class="input-gruopp">
            <p class="p_conteiner_three">______________</p>
            <h2 class="title_conteiner_three">Torneos</h2>
            <p class="p_conteiner_three">En Olympus Tennis Camp nos enorgullece ofrecer una variedad de torneos 
                emocionantes diseñados para jugadores de todos los niveles. Participa en 
                competencias amistosas, mejora tus habilidades y disfruta de la emoción del 
                juego en un entorno competitivo y amigable.</p>
            <a href="" class="a_conteniner_three"><b>Participar en un Torneo</b></a>
        </div>
    </div>
    <div class="conteiner_four roww">
        <div class="input-gruopp">
            <p class="p_conteiner_four">_____________________________</p>
            <h2 class="title_conteiner_two">Canchas de Tenis</h2>
            <p class="p_conteiner_four">Nos enorgullece ofrecer a nuestros clientes cinco canchas de tenis 
                de primera calidad, diseñadas para proporcionar la mejor experiencia de juego posible. 
                Cada una de nuestras canchas está equipada con las más modernas instalaciones, asegurando 
                un entorno seguro y cómodo para todos los jugadores. ¡No esperes más! Reserva ahora una de 
                nuestras canchas y disfruta de una partida de tenis en las mejores condiciones posibles.</p>
            <a href="" class="a_conteniner_three"><b>Reservar una cancha ¡AHORA!</b></a>
        </div>
        <div class="input-gruopp">
            <img src="{{ asset('img/Canchas de tenis.jpeg') }}" class="img_conteiner_four">
        </div>
    </div>
    <div class="conteiner_five roww">
        <div class="input-gruopp">
            <img src="{{ asset('img/Alumnos.jpeg') }}" class="img_conteiner_five">
        </div>
        <div class="input-gruopp">
            <p class="p_conteiner_three">________________________________</p>
            <h2 class="title_conteiner_five">Academias grupales</h2>
            <p class="p_conteiner_five">Descubre el placer de aprender y mejorar tu juego con nuestras
                clases de tenis. Ofrecemos programas personalizados para todas las edades y niveles de
                habilidad, impartidos por entrenadores profesionales con amplia experiencia. 
                Ya sea que estés comenzando desde cero o buscando perfeccionar tus técnicas, nuestras 
                clases te proporcionarán las herramientas y el apoyo necesarios para alcanzar tus objetivos.</p>
            <a href="" class="a_conteniner_five"><b>Inscribirme a una Academia grupal</b></a>
        </div>
    </div>
    <div class="conteiner_six roww">
        <div class="input-gruopp">
            <img src="{{ asset('img/Logo_2.png') }}" class="img_conteiner_six">
        </div>
        <div class="input-gruopp">
            <h2 class="title_conteiner_six">Ubicanos</h2>
            <p class="p_conteiner_six">Av. Dolores 125, José Luis Bustamante y Rivero 04002</p>
        </div>
        <div class="input-gruopp">
            <h2 class="title_conteiner_six">Redes</h2>
            <p class="p_conteiner_six" >Facebook - Instagram</p>
        </div>
        <div class="input-gruopp">
            <p class="p_conteiner_five"></p>
            <a href="" class="a_conteniner_six"><b>Contactanos</b></a>
        </div>
    </div>
</body>
</html>


