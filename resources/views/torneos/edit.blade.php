<x-app-layout>
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-white text-4xl font-bold mb-8 text-center">Editar Torneo</h1>
        <form action="{{ route('torneos.update', $torneo->id_torneo) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group mb-4">
                <label for="id_categoria" class="text-white">Categoría</label>
                <select name="id_categoria" id="id_categoria" class="form-control text-black">
                    @foreach($categorias as $categoria)
                        <option value="{{ $categoria->id_categoria }}" {{ $categoria->id_categoria == $torneo->id_categoria ? 'selected' : '' }}>{{ $categoria->categoria }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mb-4">
                <label for="organizador" class="text-white">Organizador</label>
                <input type="text" name="organizador" class="form-control text-black" value="{{ $torneo->organizador }}">
            </div>
            <div class="form-group mb-4">
                <label for="nombre_torneo" class="text-white">Nombre del Torneo</label>
                <input type="text" name="nombre_torneo" class="form-control text-black" value="{{ $torneo->nombre_torneo }}">
            </div>
            <div class="form-group mb-4">
                <label for="modalidad" class="text-white">Modalidad</label>
                <select name="modalidad" id="modalidad" class="form-control text-black">
                    <option value="individual" {{ $torneo->modalidad == 'individual' ? 'selected' : '' }}>Individual</option>
                    <option value="duos" {{ $torneo->modalidad == 'duos' ? 'selected' : '' }}>Duos</option>
                </select>
            </div>
            <div class="form-group mb-4">
                <label for="cupos_totales" class="text-white">Cupos Totales</label>
                <input type="number" name="cupos_totales" class="form-control text-black" value="{{ $torneo->cupos_totales }}">
            </div>
            <div class="form-group mb-4">
                <label for="fecha_inicio" class="text-white">Fecha de Inicio</label>
                <input type="date" name="fecha_inicio" class="form-control text-black" value="{{ $torneo->fecha_inicio }}">
            </div>
            <div class="form-group mb-4">
                <label for="costo_inscripcion" class="text-white">Costo de Inscripción</label>
                <input type="text" name="costo_inscripcion" class="form-control text-black" value="{{ $torneo->costo_inscripcion }}">
            </div>
            <div class="form-group mb-4">
                <label for="descripcion" class="text-white">Descripción</label>
                <textarea name="descripcion" class="form-control text-black">{{ $torneo->descripcion }}</textarea>
            </div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg">Actualizar</button>
        </form>
    </div>
</x-app-layout>

