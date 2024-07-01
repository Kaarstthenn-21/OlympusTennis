<x-app-layout>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
        <title>Document</title>
    </head>
    <body class="bg-gray-200 font-sans">

        <div class="container_one bg-gray-900 text-white py-48 bg-cover" style="background-image: url('{{ asset('img/index.jpeg') }}');">
            <div class="container mx-auto text-center">
                <h1 class="text-7xl font-bold text-white">OLYMPUS</h1>
                <h1 class="text-7xl font-bold text-white">TENNIS CAMP</h1>
                <p class="text-3xl mt-4">Bienvenido, {{ Auth::user()->name }}</p>

            </div>
        </div>
        
        
        

        <div class="bg-white py-24">
            <div class="container mx-auto flex flex-wrap items-center justify-between">
                <div class="w-full md:w-1/2 px-4">
                    <p class="text-gray-700 text-lg mb-4 text-black text-center">_____________________________________________________</p>
                    <h2 class="text-4xl font-bold mb-4 text-black text-center">Acerca de Nosotros</h2>
                    <p class="text-gray-700 text-lg mb-4 text-black">En nuestra empresa, nos apasiona brindar a nuestros clientes la oportunidad de disfrutar 
                        del tenis en su máxima expresión. Nos enorgullece ofrecer instalaciones de primera calidad 
                        y un servicio excepcional para garantizar que cada visita a nuestras canchas sea una 
                        experiencia inolvidable. Ya sea que seas un jugador experimentado o estés dando tus primeros 
                        pasos en este apasionante deporte, estamos aquí para proporcionarte un espacio donde puedas 
                        desarrollar tu pasión por el tenis y crear recuerdos duraderos. ¡Únete a nosotros y descubre 
                        todo lo que nuestro centro de alquiler de canchas tiene para ofrecer!</p>
                </div>
                <div class="w-full md:w-1/2 px-4">
                    <img src="{{ asset('img/Ubicación.jpg') }}" alt="Ubicación" class="w-full rounded-lg shadow-lg">
                </div>
            </div>
        </div>

        <div class="bg-gray-900 text-white py-24 bg-cover bg-center" style="background-image: url('{{ asset('img/Torneos 3.jpeg') }}');">
            <div class="container mx-auto flex flex-wrap items-center justify-between">
                <div class="w-full md:w-1/2 px-4">
                    <img src="{{ asset('img/Competidor 2.jpg') }}" alt="Competidor" class="w-full rounded-lg shadow-lg">
                </div>
                <div class="w-full md:w-1/2 px-4 flex flex-col items-center justify-center">
                    <p class="text-white text-lg mb-4 text-center">_________________</p>
                    <h2 class="text-4xl font-bold mb-4 text-center">Torneos</h2>
                    <p class="text-lg mb-4 text-center">En Olympus Tennis Camp nos enorgullece ofrecer una variedad de torneos 
                        emocionantes diseñados para jugadores de todos los niveles. Participa en 
                        competencias amistosas, mejora tus habilidades y disfruta de la emoción del 
                        juego en un entorno competitivo y amigable.</p>
                    <a href="#" class="inline-block bg-green-500 hover:bg-green-600 text-white px-6 py-3 rounded-lg font-semibold">Participar en un Torneo</a>
                </div>
            </div>
        </div>
        

        <div class="bg-white py-24">
            <div class="container mx-auto flex flex-wrap items-center justify-between">
                <div class="w-full md:w-1/2 px-4 flex flex-col items-center justify-center">
                    <p class="text-gray-700 text-lg mb-4 text-black text-center">_____________________________________________________</p>
                    <h2 class="text-4xl font-bold mb-4 text-black text-center">Canchas de Tenis</h2>
                    <p class="text-lg mb-4 text-black text-center">Nos enorgullece ofrecer a nuestros clientes cinco canchas de tenis 
                        de primera calidad, diseñadas para proporcionar la mejor experiencia de juego posible. 
                        Cada una de nuestras canchas está equipada con las más modernas instalaciones, asegurando 
                        un entorno seguro y cómodo para todos los jugadores. ¡No esperes más! Reserva ahora una de 
                        nuestras canchas y disfruta de una partida de tenis en las mejores condiciones posibles.</p>
                    <a href="#" class="inline-block bg-green-500 hover:bg-green-600 text-white px-6 py-3 rounded-lg font-semibold">Reservar una cancha ¡AHORA!</a>
                </div>
                <div class="w-full md:w-1/2 px-4">
                    <img src="{{ asset('img/Canchas de tenis.jpeg') }}" alt="Canchas de Tenis" class="w-full rounded-lg shadow-lg">
                </div>
            </div>
        </div>
        

        <div class="bg-gray-900 text-white py-24 bg-cover bg-center" style="background-image: url('{{ asset('img/Canchas.png') }}');">
            <div class="container mx-auto flex flex-wrap items-center justify-between">
                <div class="w-full md:w-1/2 px-4">
                    <img src="{{ asset('img/Alumnos.jpeg') }}" alt="Alumnos" class="w-full rounded-lg shadow-lg">
                </div>
                <div class="w-full md:w-1/2 px-4 flex flex-col items-center justify-center">
                    <p class="text-white text-lg mb-4 text-center">_________________________________________</p>
                    <h2 class="text-4xl font-bold mb-4 text-center">Academias grupales</h2>
                    <p class="text-lg mb-4 text-center">Descubre el placer de aprender y mejorar tu juego con nuestras
                        clases de tenis. Ofrecemos programas personalizados para todas las edades y niveles de
                        habilidad, impartidos por entrenadores profesionales con amplia experiencia. 
                        Ya sea que estés comenzando desde cero o buscando perfeccionar tus técnicas, nuestras 
                        clases te proporcionarán las herramientas y el apoyo necesarios para alcanzar tus objetivos.</p>
                    <a href="#" class="inline-block bg-green-500 hover:bg-green-600 text-white px-6 py-3 rounded-lg font-semibold">Inscribirme a una Academia grupal</a>
                </div>
            </div>
        </div>
        
        <div class="bg-white py-24">
            <div class="container mx-auto flex flex-wrap items-center justify-center text-center">
                <div class="w-full md:w-1/4 px-4 mb-8">
                    <img src="{{ asset('img/Logo_2.png') }}" alt="Logo" class="w-1/2 mx-auto rounded-lg shadow-lg">
                </div>
                <div class="w-full md:w-1/4 px-4 mb-8">
                    <h2 class="text-3xl font-bold mb-4 text-black text-center">Ubícanos</h2>
                    <p class="text-lg mb-4 text-black text-center">Av. Dolores 125, José Luis Bustamante y Rivero 04002</p>
                </div>
                <div class="w-full md:w-1/4 px-4 mb-8">
                    <h2 class="text-3xl font-bold mb-4 text-black text-center">Redes</h2>
                    <p class="text-lg mb-4 text-black text-center">Facebook - Instagram</p>
                </div>
                <div class="w-full md:w-1/4 px-4">
                    <a href="#" class="inline-block bg-green-500 hover:bg-green-600 text-white px-6 py-3 rounded-lg font-semibold">Contáctanos</a>
                </div>
            </div>
        </div>
        
    </body>
    </html>
</x-app-layout>
