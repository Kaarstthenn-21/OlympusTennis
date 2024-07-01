<x-app-layout>
    <div class="flex flex-col items-center justify-center min-h-screen bg-black text-white">
        <div class="bg-black p-10 rounded-lg shadow-md w-full max-w-md">
            <h1 class="text-center text-2xl font-bold mb-6">REGÍSTRAR NUEVA CLASE</h1>
            <form method="POST" action="{{ route('clases.store') }}">
                @csrf
                <div class="grid grid-cols-2 gap-4">
                    <div class="mb-4">
                        <label for="categoriaInput" class="block text-white text-sm font-bold mb-2">Categoría:</label>
                        <select name="id_categoria" id="categoriaInput" class="w-full px-3 py-2 border rounded-lg bg-gray-800 text-white" required>
                            <option value="">Selecciona una categoría</option>
                            @foreach ($categorias as $categoria)
                                <option value="{{ $categoria->id_categoria }}">{{ $categoria->categoria }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="instructorInput" class="block text-white text-sm font-bold mb-2">Instructor:</label>
                        <input type="text" id="instructorInput" name="instructor" class="w-full px-3 py-2 border rounded-lg bg-gray-800 text-white" required>
                    </div>
                    <div class="mb-4">
                        <label for="cupos-totalesInput" class="block text-white text-sm font-bold mb-2">Cupos Totales:</label>
                        <input type="number" id="cupos-totalesInput" name="cupos_totales" class="w-full px-3 py-2 border rounded-lg bg-gray-800 text-white" required autocomplete="off">
                    </div>
                    <div class="mb-4">
                        <label for="duracionInput" class="block text-white text-sm font-bold mb-2">Duración:(en min)</label>
                        <input type="number" id="duracionInput" name="duracion" class="w-full px-3 py-2 border rounded-lg bg-gray-800 text-white" required autocomplete="off">
                    </div>
                    <div class="mb-4">
                        <label for="fecha-inicioInput" class="block text-white text-sm font-bold mb-2">Fecha de inicio:</label>
                        <input type="date" id="fecha-inicioInput" name="fecha_inicio" class="w-full px-3 py-2 border rounded-lg bg-gray-800 text-white" required autocomplete="off">
                    </div>
                    <div class="mb-4">
                        <label for="hora-inicioInput" class="block text-white text-sm font-bold mb-2">Hora de inicio:</label>
                        <input type="time" id="hora-inicioInput" name="hora_inicio" class="w-full px-3 py-2 border rounded-lg bg-gray-800 text-white" required autocomplete="off">
                    </div>
                    <div class="mb-4">
                        <label for="hora-finInput" class="block text-white text-sm font-bold mb-2">Hora de fin:</label>
                        <input type="time" id="hora-finInput" name="hora_fin" class="w-full px-3 py-2 border rounded-lg bg-gray-800 text-white" required autocomplete="off">
                    </div>
                    <div class="mb-4 col-span-2">
                        <label for="inscripcionInput" class="block text-white text-sm font-bold mb-2">Costo de inscripción:</label>
                        <input type="number" id="inscripcionInput" name="costo_inscripcion" class="w-full px-3 py-2 border rounded-lg bg-gray-800 text-white" required autocomplete="off">
                    </div>
                    <div class="mb-4 col-span-2">
                        <label for="descripcionInput" class="block text-white text-sm font-bold mb-2">Información resumida de la clase:</label>
                        <textarea name="informacion" id="descripcionInput" class="w-full px-3 py-2 border rounded-lg bg-gray-800 text-white" required></textarea>
                    </div>
                </div>
                <div class="flex justify-center mt-4">
                    <button type="submit" class="bg-orange-500 hover:bg-orange-600 text-white font-semibold rounded-lg shadow-lg transition duration-300 transform hover:scale-105 px-4 py-2">
                        REGISTRAR
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>

