<x-app-layout>
    <head>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap">
        <style>
            .custom-heading {
                font-family: 'Roboto', sans-serif;
                font-weight: bold;
                font-size: 80px;
                color: #FFFFFF;
                text-shadow: 
                    -1px -1px 0 #000000,  
                    1px -1px 0 #000000,
                    -1px 1px 0 #000000,
                    1px 1px 0 #000000;
                margin-bottom: 20px;
            }
            .horario-btn {
                font-family: 'Roboto', sans-serif;
                font-weight: bold;
                padding: 20px;
                width: 150px;
                margin: 5px;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                transition: background-color 0.3s ease;
                color: #FFFFFF; /* Color de texto blanco */
            }
            .horario-btn.disponible {
                background-color: #739505;
            }
            .horario-btn.seleccionado {
                background-color: #4CAF50;
            }
            .horario-btn.no-disponible {
                background-color: #a91106;
                cursor: not-allowed;
            }
            .horario-btn.disponible:hover {
                background-color: #739505;
            }
            #horarios {
                display: flex;
                flex-wrap: wrap;
                gap: 10px;
                margin-top: 20px;
            }
            .horario-row {
                display: flex;
                flex-basis: 100%;
                margin-bottom: 10px;
            }
            #fecha-container {
                display: flex;
                flex-direction: column;
                align-items: flex-start;
            }
            #fecha {
                padding: 10px;
                border: 2px solid #000000;
                border-radius: 5px;
                font-size: 16px;
                margin-top: 40px;
                color: #000000;
            }
            #reserva-btn {
                margin-top: 20px;
                align-self: flex-start;
            }
            .container {
                display: flex;
                flex-direction: column;
                justify-content: space-between;
                align-items: flex-start;
                width: 100%;
            }
            .content-container {
                display: flex;
                justify-content: space-between;
                align-items: center;
                width: 100%;
                margin-top: 40px;
            }
        </style>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script>
            let horariosSeleccionados = [];
            
            function mostrarHorarios(canchaId) {
                const fecha = document.getElementById('fecha').value;
                if (fecha) {
                    fetch(`/getHorarios/${canchaId}?fecha=${fecha}`)
                        .then(response => response.json())
                        .then(data => {
                            const horariosDiv = document.getElementById('horarios');
                            horariosDiv.innerHTML = '';
                            let row = null;
                            data.forEach((horario, index) => {
                                if (index % 4 === 0) {
                                    row = document.createElement('div');
                                    row.className = 'horario-row';
                                    horariosDiv.appendChild(row);
                                }
                                const btn = document.createElement('button');
                                btn.textContent = horario.hora;
                                btn.className = 'horario-btn';
                                if (horario.disponible) {
                                    btn.classList.add('disponible');
                                    btn.onclick = () => seleccionarHorario(btn, horario.hora);
                                } else {
                                    btn.classList.add('no-disponible');
                                    btn.disabled = true;
                                }
                                row.appendChild(btn);
                            });
                        });
                }
            }
    
            function seleccionarHorario(button, horario) {
                if (horariosSeleccionados.includes(horario)) {
                    horariosSeleccionados = horariosSeleccionados.filter(h => h !== horario);
                    button.classList.remove('seleccionado');
                } else {
                    horariosSeleccionados.push(horario);
                    button.classList.add('seleccionado');
                }
                console.log(horariosSeleccionados);
            }
    
            function irAResumen(canchaId) {
                const fecha = document.getElementById('fecha').value;
                if (fecha && horariosSeleccionados.length > 0) {
                    const form = document.createElement('form');
                    form.method = 'POST';
                    form.action = '/resumen';
                    form.innerHTML = `
                        <input type="hidden" name="_token" value="${document.querySelector('meta[name="csrf-token"]').getAttribute('content')}">
                        <input type="hidden" name="fecha" value="${fecha}">
                        <input type="hidden" name="cancha" value="${canchaId}">
                        ${horariosSeleccionados.map(h => `<input type="hidden" name="horarios[]" value="${h}">`).join('')}
                    `;
                    document.body.appendChild(form);
                    form.submit();
                } else {
                    alert('Por favor, selecciona una fecha y al menos un horario.');
                }
            }
        </script>
    </head>
    <div class="relative min-h-screen flex flex-col justify-center items-start text-left px-10 bg-cover bg-center bg-no-repeat" style="background-image: url('/images/background.png');">
        <h1 class="custom-heading">Reservar Horario</h1>
        <div class="content-container">
            <div id="fecha-container">
                <input type="date" id="fecha" onchange="mostrarHorarios({{ $cancha->id }})">
                <button id="reserva-btn" onclick="irAResumen({{ $cancha->id }})" class="horario-btn disponible">Reservar</button>
            </div>
            <div id="horarios"></div>
        </div>
    </div>
</x-app-layout>

    
    
    

