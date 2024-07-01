<x-app-layout>
    <div class="container mx-auto px-4 py-8">
        @if(session('success'))
            <div class="bg-green-500 text-white p-4 rounded-lg mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-500 text-white p-4 rounded-lg mb-4">
                {{ session('error') }}
            </div>
        @endif

        <h1 class="text-white text-4xl font-bold mb-8 text-center">Listado de Reservas</h1>

        @if ($user->is_admin == 1)
            <form action="{{ route('reservas.index') }}" method="GET" class="mb-4">
                <div class="flex justify-center">
                    <input type="text" name="dni" placeholder="Buscar por DNI" value="{{ old('dni', $dni) }}" class="px-4 py-2 border rounded-l-lg focus:outline-none text-black">
                    <input type="date" name="fecha" placeholder="Buscar por Fecha" value="{{ old('fecha', $fecha) }}" class="px-4 py-2 border rounded-l-lg focus:outline-none text-black ml-2">
                    <button type="submit" class="px-4 py-2 text-white rounded-r-lg" style="background-color: #739505;">Buscar</button>
                </div>
            </form>

            <table class="table-auto w-full text-white">
                <thead>
                    <tr>
                        <th class="px-4 py-2">Cancha</th>
                        <th class="px-4 py-2">Fecha</th>
                        <th class="px-4 py-2">Horario</th>
                        <th class="px-4 py-2">Usuario</th>
                        <th class="px-4 py-2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($reservas as $reserva)
                        <tr class="bg-gray-800">
                            <td class="border px-4 py-2">{{ $reserva->cancha->nombre }}</td>
                            <td class="border px-4 py-2">{{ $reserva->fecha }}</td>
                            <td class="border px-4 py-2">{{ $reserva->horario }}</td>
                            <td class="border px-4 py-2">{{ $reserva->user->name }}</td>
                            <td class="border px-4 py-2 flex justify-center">
                                <form action="{{ route('reservas.destroy', $reserva->id) }}" method="POST" class="mr-2">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-lg" onclick="return confirm('¿Estás seguro de que quieres finalizar esta reserva?')">Finalizar Reserva</button>
                                </form>
                                <button type="button" class="bg-blue-500 text-white px-4 py-2 rounded-lg" onclick="mostrarInfoReserva({{ $reserva->id }})">Mostrar Info de la Reserva</button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="border px-4 py-2 text-center">No hay reservas disponibles</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        @else
            <p class="text-center text-red-500">No tienes permisos para ver esta página.</p>
        @endif
    </div>

    <div id="reserva-modal" class="fixed inset-0 bg-gray-900 bg-opacity-75 flex items-center justify-center hidden">
        <div class="bg-white p-4 rounded-lg shadow-lg w-1/2">
            <div id="reserva-info"></div>
            <img id="pago-img" src="" alt="Comprobante de Pago" class="mb-4 mt-4 w-full">
            <button class="bg-red-500 text-white px-4 py-2 rounded-lg" onclick="cerrarModal()">Cerrar</button>
        </div>
    </div>

    <script>
        function mostrarInfoReserva(reservaId) {
            fetch(`/reservas/${reservaId}`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('reserva-info').innerHTML = `
                        <p><strong>Cancha:</strong> ${data.cancha}</p>
                        <p><strong>Fecha:</strong> ${data.fecha}</p>
                        <p><strong>Horario:</strong> ${data.horario}</p>
                        <p><strong>Usuario:</strong> ${data.usuario}</p>
                        <p><strong>Monto:</strong> ${data.monto}</p>
                    `;
                    document.getElementById('pago-img').src = data.imagen_pago;
                    document.getElementById('reserva-modal').classList.remove('hidden');
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }

        function cerrarModal() {
            document.getElementById('reserva-modal').classList.add('hidden');
        }
    </script>
</x-app-layout>



