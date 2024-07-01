<x-app-layout>
    <div class="flex flex-col items-center justify-center min-h-screen bg-black text-white">
        <div class="bg-black p-10 rounded-lg shadow-md w-full max-w-md">
            <h1 class="text-center text-2xl font-bold mb-6">Editar Clase</h1>
            <form action="{{ route('clases.update', $clase->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-2 gap-4">
                    <div class="mb-4">
                        <label for="id_categoria" class="block text-white text-sm font-bold mb-2">Categoría:</label>
                        <select id="id_categoria" name="id_categoria" class="w-full px-3 py-2 border rounded-lg bg-gray-800 text-white" required>
                            <option value="">Seleccionar categoría</option>
                            @foreach ($categorias as $categoria)
                                <option value="{{ $categoria->id_categoria }}" {{ $clase->id_categoria == $categoria->id_categoria ? 'selected' : '' }}>{{ $categoria->categoria }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="instructor" class="block text-white text-sm font-bold mb-2">Instructor:</label>
                        <input type="text" id="instructor" name="instructor" class="w-full px-3 py-2 border rounded-lg bg-gray-800 text-white" value="{{ $clase->instructor }}" required>
                    </div>
                    <div class="mb-4">
                        <label for="cupos_totales" class="block text-white text-sm font-bold mb-2">Cupos Totales:</label>
                        <input type="number" id="cupos_totales" name="cupos_totales" class="w-full px-3 py-2 border rounded-lg bg-gray-800 text-white" value="{{ $clase->cupos_totales }}" required>
                    </div>
                    <div class="mb-4">
                        <label for="duracion" class="block text-white text-sm font-bold mb-2">Duración (en minutos):</label>
                        <input type="number" id="duracion" name="duracion" class="w-full px-3 py-2 border rounded-lg bg-gray-800 text-white" value="{{ $clase->duracion }}" required>
                    </div>
                    <div class="mb-4">
                        <label for="fecha_inicio" class="block text-white text-sm font-bold mb-2">Fecha de Inicio:</label>
                        <input type="date" id="fecha_inicio" name="fecha_inicio" class="w-full px-3 py-2 border rounded-lg bg-gray-800 text-white" value="{{ $clase->fecha_inicio }}" required>
                    </div>
                    <div class="mb-4">
                        <label for="hora_inicio" class="block text-white text-sm font-bold mb-2">Hora de Inicio:</label>
                        <input type="time" id="hora_inicio" name="hora_inicio" class="w-full px-3 py-2 border rounded-lg bg-gray-800 text-white" value="{{ $clase->hora_inicio }}" required>
                    </div>
                    <div class="mb-4">
                        <label for="hora_fin" class="block text-white text-sm font-bold mb-2">Hora de Fin:</label>
                        <input type="time" id="hora_fin" name="hora_fin" class="w-full px-3 py-2 border rounded-lg bg-gray-800 text-white" value="{{ $clase->hora_fin }}" required>
                    </div>
                    <div class="mb-4 col-span-2">
                        <label for="costo_inscripcion" class="block text-white text-sm font-bold mb-2">Costo de Inscripción:</label>
                        <input type="number" id="costo_inscripcion" name="costo_inscripcion" class="w-full px-3 py-2 border rounded-lg bg-gray-800 text-white" value="{{ $clase->costo_inscripcion }}" required>
                    </div>
                    <div class="mb-4 col-span-2">
                        <label for="informacion" class="block text-white text-sm font-bold mb-2">Información:</label>
                        <textarea id="informacion" name="informacion" class="w-full px-3 py-2 border rounded-lg bg-gray-800 text-white" required>{{ $clase->informacion }}</textarea>
                    </div>
                </div>
                <div class="flex justify-center mt-4">
                    <button type="submit" class="bg-gradient-to-r from-blue-500 to-green-500 hover:from-blue-600 hover:to-green-600 text-white font-semibold rounded-lg shadow-lg transition duration-300 transform hover:scale-105 px-4 py-2">Actualizar Clase</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>

